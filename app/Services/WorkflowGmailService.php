<?php

namespace App\Services;

use Carbon\Carbon;
use Exception;
use Google\Client;
use Google\Service\Gmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WorkflowGmailService
{
    /**
     * Authenticate and test a Gmail connector.
     */
    public function authenticateConnector($connector)
    {
        /*
        |--------------------------------------------------------------------------
        | Validate Gmail credentials
        |--------------------------------------------------------------------------
        */

        if (
            empty($connector->account_email) ||
            empty($connector->email_client_id) ||
            empty($connector->email_client_secret)
        ) {
            throw new Exception(
                'Gmail connector credentials are incomplete.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Check OAuth refresh token
        |--------------------------------------------------------------------------
        */

        if (empty($connector->refresh_token)) {
            throw new Exception(
                'Gmail account has not been authorized yet.'
            );
        }

        try {

            /*
            |--------------------------------------------------------------------------
            | Create Google Client
            |--------------------------------------------------------------------------
            */

            $client = new Client();

            $client->setClientId(
                $connector->email_client_id
            );

            $client->setClientSecret(
                $connector->email_client_secret
            );

            $client->setAccessType('offline');

            $client->setScopes([
                'https://www.googleapis.com/auth/gmail.readonly',
                'https://www.googleapis.com/auth/gmail.modify',
                'https://www.googleapis.com/auth/gmail.send',
            ]);

            /*
            |--------------------------------------------------------------------------
            | Build token
            |--------------------------------------------------------------------------
            */

            $token = [
                'access_token'  => $connector->access_token,
                'refresh_token' => $connector->refresh_token,
            ];

            if ($connector->token_expires_at) {

                $expiresAt = Carbon::parse(
                    $connector->token_expires_at
                );

                $token['expires_in'] = max(
                    0,
                    now()->diffInSeconds(
                        $expiresAt,
                        false
                    )
                );
            }

            $client->setAccessToken($token);

            /*
            |--------------------------------------------------------------------------
            | Refresh access token
            |--------------------------------------------------------------------------
            */

            if ($client->isAccessTokenExpired()) {

                $newToken = $client->fetchAccessTokenWithRefreshToken(
                    $connector->refresh_token
                );

                if (
                    isset($newToken['error']) ||
                    empty($newToken['access_token'])
                ) {
                    throw new Exception(
                        $newToken['error_description']
                        ?? $newToken['error']
                        ?? 'Unable to refresh Gmail token.'
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | Save new access token
                |--------------------------------------------------------------------------
                */

                $connector->access_token =
                    $newToken['access_token'];

                /*
                |--------------------------------------------------------------------------
                | Keep existing refresh token unless
                | Google gives us a new one.
                |--------------------------------------------------------------------------
                */

                if (!empty($newToken['refresh_token'])) {

                    $connector->refresh_token =
                        $newToken['refresh_token'];
                }

                /*
                |--------------------------------------------------------------------------
                | Save expiration
                |--------------------------------------------------------------------------
                */

                if (!empty($newToken['expires_in'])) {

                    $connector->token_expires_at =
                        now()->addSeconds(
                            $newToken['expires_in']
                        );
                }

                $connector->token_status = 'token_valid';
                $connector->save();

                /*
                |--------------------------------------------------------------------------
                | Update client
                |--------------------------------------------------------------------------
                */

                $client->setAccessToken([
                    'access_token' =>
                        $connector->access_token,

                    'refresh_token' =>
                        $connector->refresh_token,

                    'expires_in' =>
                        $newToken['expires_in'] ?? 3600,
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Create Gmail service
            |--------------------------------------------------------------------------
            */

            $gmail = new Gmail($client);

            /*
            |--------------------------------------------------------------------------
            | Get authenticated Gmail profile
            |--------------------------------------------------------------------------
            */

            $profile = $gmail->users->getProfile('me');

            $gmailEmail = $profile->getEmailAddress();

            /*
            |--------------------------------------------------------------------------
            | Verify configured account
            |--------------------------------------------------------------------------
            */

            if (
                strtolower(trim($gmailEmail))
                !==
                strtolower(trim($connector->account_email))
            ) {
                throw new Exception(
                    "Authenticated Gmail account ({$gmailEmail}) does not match the configured account ({$connector->account_email})."
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Mark connector valid
            |--------------------------------------------------------------------------
            */

            $connector->token_status = 'token_valid';
            $connector->status = 'active';
            $connector->save();

            return [
                'success' => true,
                'email'   => $gmailEmail,
                'client'  => $client,
                'gmail'   => $gmail,
                'message' => 'Gmail authentication successful.',
            ];

        } catch (\Throwable $e) {

            $connector->token_status = 'token_error';
            $connector->status = 'error';
            $connector->save();

            throw new Exception(
                'Gmail authentication failed: ' .
                $e->getMessage()
            );
        }
    }


    public function authorizeGmail($connector)
    {
        if ($connector->type !== 'input') {
            throw new \Exception(
                'Invalid Gmail input connector.'
            );
        }

        if (
            empty($connector->email_client_id) ||
            empty($connector->email_client_secret)
        ) {
            throw new \Exception(
                'Gmail Client ID and Client Secret are required.'
            );
        }

        $client = new \Google\Client();

        $client->setClientId(
            $connector->email_client_id
        );

        $client->setClientSecret(
            $connector->email_client_secret
        );

        $client->setRedirectUri(
            route('admin.workflow.connector.gmail.callback')
        );

        $client->setAccessType('offline');
        $client->setPrompt('consent');

        $client->setScopes([
            'https://www.googleapis.com/auth/gmail.readonly',
            'https://www.googleapis.com/auth/gmail.modify',
            'https://www.googleapis.com/auth/gmail.send',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Remember connector
        |--------------------------------------------------------------------------
        */

        session([
            'gmail_oauth_connector_id' => $connector->id,
        ]);

        return $client->createAuthUrl();
    }


    public function checkWorkflowEmails($workflow)
    {
        /*
        |--------------------------------------------------------------------------
        | 1. Get configuration
        |--------------------------------------------------------------------------
        */

        Log::info('WORKFLOW: Processing started', [
            'workflow_id' => $workflow->id,
            'configuration_id' => $workflow->configuration_id,
            'status' => $workflow->status,
        ]);

        try {

            $configuration = \App\Models\Configuration::findOrFail(
                $workflow->configuration_id
            );

            Log::info('WORKFLOW: Configuration loaded', [
                'workflow_id' => $workflow->id,
                'configuration_id' => $configuration->id,
                'config_name' => $configuration->config_name ?? null,
            ]);


            /*
            |--------------------------------------------------------------------------
            | 2. Get configured_data
            |--------------------------------------------------------------------------
            */

            $config = $configuration->configured_data;

            Log::info('WORKFLOW: Raw configured_data received', [
                'workflow_id' => $workflow->id,
                'configuration_id' => $configuration->id,
                'type' => gettype($config),
                'is_null' => is_null($config),
                'length' => is_string($config) ? strlen($config) : null,
            ]);

            if (is_string($config)) {

                $config = json_decode($config, true);

                Log::info('WORKFLOW: configured_data decoded', [
                    'workflow_id' => $workflow->id,
                    'configuration_id' => $configuration->id,
                    'json_error' => json_last_error_msg(),
                    'decoded_type' => gettype($config),
                ]);
            }

            if (!is_array($config)) {

                Log::error('WORKFLOW: Invalid configured_data', [
                    'workflow_id' => $workflow->id,
                    'configuration_id' => $workflow->configuration_id,
                    'configured_data_type' => gettype(
                        $configuration->configured_data
                    ),
                    'configured_data' => $configuration->configured_data,
                ]);

                throw new \Exception(
                    "Invalid configured_data for configuration {$workflow->configuration_id}"
                );
            }

            Log::info('WORKFLOW: Configuration data validated', [
                'workflow_id' => $workflow->id,
                'configuration_id' => $configuration->id,
                'config_keys' => array_keys($config),
            ]);


            /*
            |--------------------------------------------------------------------------
            | 3. Get Email input connector
            |--------------------------------------------------------------------------
            */

            $inputConnectorIds = is_array($workflow->input_connector_id)
                ? $workflow->input_connector_id
                : json_decode($workflow->input_connector_id, true);

            if (!is_array($inputConnectorIds)) {
                $inputConnectorIds = [
                    $workflow->input_connector_id
                ];
            }

            Log::info('WORKFLOW: Looking for email connector', [
                'workflow_id' => $workflow->id,
                'connector_ids' => $inputConnectorIds,
            ]);

            $inputConnector = \App\Models\WorkflowConnector::whereIn(
                'id',
                array_filter($inputConnectorIds)
            )
                ->where('type', 'input')
                ->whereRaw('LOWER(name) = ?', ['email'])
                ->first();

            if (!$inputConnector) {

                Log::error('WORKFLOW: Email connector not found', [
                    'workflow_id' => $workflow->id,
                    'connector_ids' => $inputConnectorIds,
                ]);

                throw new \Exception(
                    'No Email input connector found for workflow ' .
                    $workflow->id
                );
            }

            Log::info('WORKFLOW: Email connector found', [
                'workflow_id' => $workflow->id,
                'connector_id' => $inputConnector->id,
                'connector_name' => $inputConnector->name,
                'account_email' => $inputConnector->account_email,
                'token_status' => $inputConnector->token_status,
            ]);


            /*
            |--------------------------------------------------------------------------
            | 4. Authenticate Gmail
            |--------------------------------------------------------------------------
            */

            Log::info('WORKFLOW: Authenticating Gmail connector', [
                'workflow_id' => $workflow->id,
                'connector_id' => $inputConnector->id,
            ]);

            $auth = $this->authenticateConnector($inputConnector);

            $gmail = $auth['gmail'];

            Log::info('WORKFLOW: Gmail authentication successful', [
                'workflow_id' => $workflow->id,
                'connector_id' => $inputConnector->id,
                'email' => $auth['email'] ?? $inputConnector->account_email,
            ]);


            /*
            |--------------------------------------------------------------------------
            | 5. Search unread PDF-CONVERTER emails
            |--------------------------------------------------------------------------
            */

            Log::info('WORKFLOW: Searching Gmail', [
                'workflow_id' => $workflow->id,
                'query' => 'in:anywhere is:unread subject:"PDF-CONVERTER"',
            ]);

            $response = $gmail->users_messages->listUsersMessages(
                'me',
                [
                    'q' => 'in:anywhere is:unread subject:"PDF-CONVERTER"',
                    'includeSpamTrash' => true,
                ]
            );

            $messages = $response->getMessages() ?? [];

            Log::info('WORKFLOW: Gmail search completed', [
                'workflow_id' => $workflow->id,
                'message_count' => count($messages),
            ]);


            /*
            |--------------------------------------------------------------------------
            | 6. No matching emails
            |--------------------------------------------------------------------------
            */

            if (empty($messages)) {

                Log::info('WORKFLOW: No matching unread emails found', [
                    'workflow_id' => $workflow->id,
                ]);

                return [
                    'count' => 0,
                    'processed' => 0,
                    'failed' => 0,
                    'emails' => [],
                ];
            }


            /*
            |--------------------------------------------------------------------------
            | 7. Process each email
            |--------------------------------------------------------------------------
            */

            $processed = 0;
            $failed = 0;
            $emailResults = [];

            foreach ($messages as $message) {

                $messageId = $message->getId();

                Log::info('WORKFLOW: Processing email', [
                    'workflow_id' => $workflow->id,
                    'message_id' => $messageId,
                ]);

                try {

                    /*
                    |--------------------------------------------------------------------------
                    | Get complete Gmail message
                    |--------------------------------------------------------------------------
                    */

                    Log::info('WORKFLOW: Getting full Gmail message', [
                        'workflow_id' => $workflow->id,
                        'message_id' => $messageId,
                    ]);

                    $email = $gmail->users_messages->get(
                        'me',
                        $messageId,
                        [
                            'format' => 'full',
                        ]
                    );

                    $payload = $email->getPayload();


                    /*
                    |--------------------------------------------------------------------------
                    | Get subject and sender
                    |--------------------------------------------------------------------------
                    */

                    $subject = '';
                    $from = '';

                    foreach ($payload->getHeaders() as $header) {

                        $headerName = strtolower(
                            $header->getName()
                        );

                        if ($headerName === 'subject') {
                            $subject = trim(
                                $header->getValue()
                            );
                        }

                        if ($headerName === 'from') {
                            $from = trim(
                                $header->getValue()
                            );
                        }
                    }

                    Log::info('WORKFLOW: Email details', [
                        'workflow_id' => $workflow->id,
                        'message_id' => $messageId,
                        'subject' => $subject,
                        'from' => $from,
                    ]);


                    /*
                    |--------------------------------------------------------------------------
                    | Get attachments
                    |--------------------------------------------------------------------------
                    */

                    Log::info('WORKFLOW: Extracting attachments', [
                        'workflow_id' => $workflow->id,
                        'message_id' => $messageId,
                    ]);

                    $attachments = [];

                    $this->extractAttachments(
                        $gmail,
                        $messageId,
                        $payload,
                        $attachments
                    );

                    Log::info('WORKFLOW: Attachments extracted', [
                        'workflow_id' => $workflow->id,
                        'message_id' => $messageId,
                        'attachment_count' => count($attachments),
                        'attachments' => array_map(
                            function ($attachment) {
                                return [
                                    'filename' => $attachment['filename'] ?? null,
                                    'size' => isset($attachment['data'])
                                        ? strlen($attachment['data'])
                                        : 0,
                                ];
                            },
                            $attachments
                        ),
                    ]);

                    if (empty($attachments)) {

                        Log::error('WORKFLOW: No attachments found', [
                            'workflow_id' => $workflow->id,
                            'message_id' => $messageId,
                            'subject' => $subject,
                        ]);

                        $failed++;

                        $emailResults[] = [
                            'message_id' => $messageId,
                            'subject' => $subject,
                            'status' => 'failed',
                            'message' => 'No attachment found.',
                        ];

                        continue;
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Process PDF attachments
                    |--------------------------------------------------------------------------
                    */

                    $processedAttachments = [];

                    foreach ($attachments as $attachment) {

                        $filename = basename(
                            $attachment['filename']
                        );

                        Log::info('WORKFLOW: Checking attachment', [
                            'workflow_id' => $workflow->id,
                            'message_id' => $messageId,
                            'filename' => $filename,
                        ]);


                        /*
                        |--------------------------------------------------------------------------
                        | Only process PDF files
                        |--------------------------------------------------------------------------
                        */

                        if (
                            strtolower(
                                pathinfo(
                                    $filename,
                                    PATHINFO_EXTENSION
                                )
                            ) !== 'pdf'
                        ) {

                            Log::info('WORKFLOW: Skipping non-PDF attachment', [
                                'workflow_id' => $workflow->id,
                                'message_id' => $messageId,
                                'filename' => $filename,
                            ]);

                            continue;
                        }

                        Log::info('WORKFLOW: PDF attachment found', [
                            'workflow_id' => $workflow->id,
                            'message_id' => $messageId,
                            'filename' => $filename,
                            'size' => isset($attachment['data'])
                                ? strlen($attachment['data'])
                                : 0,
                        ]);


                        /*
                        |--------------------------------------------------------------------------
                        | Send PDF + configuration to processor
                        |--------------------------------------------------------------------------
                        */

                        Log::info('WORKFLOW: Sending PDF to document processor', [
                            'workflow_id' => $workflow->id,
                            'message_id' => $messageId,
                            'filename' => $filename,
                            'configuration_id' => $configuration->id,
                            'processor' =>
                                'http://76.13.131.17:32775/docs/schworer/new-rule-3',
                        ]);

                        $processorResponse =
                            \Illuminate\Support\Facades\Http::timeout(300)
                                ->attach(
                                    'file',
                                    $attachment['data'],
                                    $filename
                                )
                                ->post(
                                    'http://76.13.131.17:32775/docs/schworer/new-rule-3',
                                    [
                                        'config' => json_encode(
                                            $config,
                                            JSON_UNESCAPED_UNICODE |
                                            JSON_UNESCAPED_SLASHES
                                        ),
                                    ]
                                );


                        /*
                        |--------------------------------------------------------------------------
                        | Processor failed
                        |--------------------------------------------------------------------------
                        */

                        if (!$processorResponse->successful()) {

                            Log::error(
                                'WORKFLOW: Document processor failed',
                                [
                                    'workflow_id' => $workflow->id,
                                    'message_id' => $messageId,
                                    'filename' => $filename,
                                    'http_status' =>
                                        $processorResponse->status(),
                                    'response' =>
                                        $processorResponse->body(),
                                ]
                            );

                            throw new \Exception(
                                'Document processor failed with status ' .
                                $processorResponse->status() .
                                ': ' .
                                $processorResponse->body()
                            );
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | Processor response
                        |--------------------------------------------------------------------------
                        */

                        $processorData = $processorResponse->json();

                        Log::info('WORKFLOW: Document processor succeeded', [
                            'workflow_id' => $workflow->id,
                            'message_id' => $messageId,
                            'filename' => $filename,
                            'response' => $processorData,
                        ]);

                        $mappedFilename =
                            $processorData['Mapped_txt_file'] ?? null;

                        if (!$mappedFilename) {

                            Log::error(
                                'WORKFLOW: Mapped_txt_file missing',
                                [
                                    'workflow_id' => $workflow->id,
                                    'message_id' => $messageId,
                                    'filename' => $filename,
                                    'processor_response' => $processorData,
                                ]
                            );

                            throw new \Exception(
                                'Mapped_txt_file was not returned by processor.'
                            );
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | Download generated TXT
                        |--------------------------------------------------------------------------
                        */

                        $downloadUrl =
                            'http://76.13.131.17:32775/download/output_file/' .
                            rawurlencode($mappedFilename);

                        Log::info('WORKFLOW: Downloading generated TXT', [
                            'workflow_id' => $workflow->id,
                            'message_id' => $messageId,
                            'mapped_filename' => $mappedFilename,
                            'download_url' => $downloadUrl,
                        ]);

                        $txtResponse =
                            \Illuminate\Support\Facades\Http::timeout(300)
                                ->get($downloadUrl);

                        if (!$txtResponse->successful()) {

                            Log::error(
                                'WORKFLOW: Generated TXT download failed',
                                [
                                    'workflow_id' => $workflow->id,
                                    'message_id' => $messageId,
                                    'mapped_filename' => $mappedFilename,
                                    'http_status' => $txtResponse->status(),
                                    'response' => $txtResponse->body(),
                                ]
                            );

                            throw new \Exception(
                                'Failed to download generated TXT file. HTTP ' .
                                $txtResponse->status()
                            );
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | Save generated TXT
                        |--------------------------------------------------------------------------
                        */

                        $storagePath =
                            'workflow/' .
                            $workflow->id .
                            '/' .
                            $mappedFilename;

                        \Illuminate\Support\Facades\Storage::disk('public')->put(
                            $storagePath,
                            $txtResponse->body()
                        );

                        Log::info('WORKFLOW: Generated TXT saved', [
                            'workflow_id' => $workflow->id,
                            'message_id' => $messageId,
                            'storage_path' => $storagePath,
                        ]);


                        /*
                        |--------------------------------------------------------------------------
                        | Store processed attachment result
                        |--------------------------------------------------------------------------
                        */

                        $processedAttachments[] = [
                            'filename' => $filename,
                            'mapped_file' => $mappedFilename,
                            'txt_file' => $storagePath,
                            'txt_content' => $txtResponse->body(),
                        ];
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Make sure a PDF was processed
                    |--------------------------------------------------------------------------
                    */

                    if (empty($processedAttachments)) {

                        Log::error('WORKFLOW: No PDF attachment found', [
                            'workflow_id' => $workflow->id,
                            'message_id' => $messageId,
                            'subject' => $subject,
                        ]);

                        throw new \Exception(
                            'No PDF attachment found in email.'
                        );
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Mark Gmail message as read
                    |--------------------------------------------------------------------------
                    */

                    Log::info('WORKFLOW: Marking email as read', [
                        'workflow_id' => $workflow->id,
                        'message_id' => $messageId,
                    ]);

                    $gmail->users_messages->modify(
                        'me',
                        $messageId,
                        new \Google\Service\Gmail\ModifyMessageRequest([
                            'removeLabelIds' => [
                                'UNREAD',
                            ],
                        ])
                    );


                    $processed++;

                    Log::info('WORKFLOW: Email processed successfully', [
                        'workflow_id' => $workflow->id,
                        'message_id' => $messageId,
                        'subject' => $subject,
                        'processed_attachments' => $processedAttachments,
                    ]);

                    $emailResults[] = [
                        'message_id' => $messageId,
                        'subject' => $subject,
                        'from' => $from,
                        'status' => 'processed',
                        'attachments' => $processedAttachments,
                    ];

                } catch (\Throwable $e) {

                    $failed++;

                    /*
                    |--------------------------------------------------------------------------
                    | IMPORTANT: Full error log
                    |--------------------------------------------------------------------------
                    */

                    Log::error('WORKFLOW: Email processing failed', [
                        'workflow_id' => $workflow->id,
                        'configuration_id' => $workflow->configuration_id,
                        'message_id' => $messageId,
                        'error' => $e->getMessage(),
                        'exception' => get_class($e),
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                        'trace' => $e->getTraceAsString(),
                    ]);

                    $emailResults[] = [
                        'message_id' => $messageId,
                        'status' => 'failed',
                        'message' => $e->getMessage(),
                    ];
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Return result
            |--------------------------------------------------------------------------
            */

            Log::info('WORKFLOW: Processing completed', [
                'workflow_id' => $workflow->id,
                'configuration_id' => $workflow->configuration_id,
                'found' => count($messages),
                'processed' => $processed,
                'failed' => $failed,
            ]);

            return [
                'count' => count($messages),
                'processed' => $processed,
                'failed' => $failed,
                'emails' => $emailResults,
            ];
        } catch (\Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | Fatal workflow-level error
            |--------------------------------------------------------------------------
            */

            Log::error('WORKFLOW: Fatal workflow error', [
                'workflow_id' => $workflow->id,
                'configuration_id' => $workflow->configuration_id,
                'error' => $e->getMessage(),
                'exception' => get_class($e),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            throw $e;
        }
    }

    private function extractAttachments(
            $gmail,
            string $messageId,
            $part,
            array &$attachments
        ) 
    {
            if (!$part) {
                return;
            }

            /*
            |--------------------------------------------------------------------------
            | Check this part for an attachment
            |--------------------------------------------------------------------------
            */

            $filename = $part->getFilename();

            if (!empty($filename)) {

                $body = $part->getBody();

                if ($body && $body->getAttachmentId()) {

                    $attachmentId = $body->getAttachmentId();

                    Log::info('WORKFLOW: Downloading Gmail attachment', [
                        'message_id' => $messageId,
                        'filename' => $filename,
                        'attachment_id' => $attachmentId,
                    ]);

                    $attachment = $gmail->users_messages_attachments->get(
                        'me',
                        $messageId,
                        $attachmentId
                    );

                    $data = $attachment->getData();

                    if ($data) {

                        $data = strtr(
                            $data,
                            '-_',
                            '+/'
                        );

                        $decodedData = base64_decode($data);

                        if ($decodedData !== false) {

                            $attachments[] = [
                                'filename' => $filename,
                                'data' => $decodedData,
                            ];

                            Log::info(
                                'WORKFLOW: Gmail attachment downloaded',
                                [
                                    'message_id' => $messageId,
                                    'filename' => $filename,
                                    'size' => strlen($decodedData),
                                ]
                            );
                        }
                    }
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Recursively process child parts
            |--------------------------------------------------------------------------
            */

            $parts = $part->getParts();

            if (!empty($parts)) {

                foreach ($parts as $childPart) {

                    $this->extractAttachments(
                        $gmail,
                        $messageId,
                        $childPart,
                        $attachments
                    );
                }
            }
        }


    
    
    public function gmailCallback(Request $request)
    {
        $connectorId = session(
            'gmail_oauth_connector_id'
        );

        if (!$connectorId) {
            throw new \Exception(
                'Gmail authorization session expired.'
            );
        }

        $connector = \App\Models\WorkflowConnector::findOrFail(
            $connectorId
        );

        if ($request->has('error')) {
            throw new \Exception(
                'Gmail authorization was cancelled or denied.'
            );
        }

        if (!$request->code) {
            throw new \Exception(
                'Google did not return an authorization code.'
            );
        }

        $client = new \Google\Client();

        $client->setClientId(
            $connector->email_client_id
        );

        $client->setClientSecret(
            $connector->email_client_secret
        );

        $client->setRedirectUri(
            route('admin.workflow.connector.gmail.callback')
        );

        $client->setAccessType('offline');

        $token = $client->fetchAccessTokenWithAuthCode(
            $request->code
        );

        if (
            isset($token['error']) ||
            empty($token['access_token'])
        ) {
            throw new \Exception(
                $token['error_description']
                ?? $token['error']
                ?? 'Unable to obtain Gmail token.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Save access token
        |--------------------------------------------------------------------------
        */

        $connector->access_token =
            $token['access_token'];

        /*
        |--------------------------------------------------------------------------
        | Save refresh token
        |--------------------------------------------------------------------------
        */

        if (!empty($token['refresh_token'])) {

            $connector->refresh_token =
                $token['refresh_token'];

        } elseif (empty($connector->refresh_token)) {

            throw new \Exception(
                'Google did not return a refresh token.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Save expiration
        |--------------------------------------------------------------------------
        */

        if (!empty($token['expires_in'])) {

            $connector->token_expires_at =
                now()->addSeconds(
                    $token['expires_in']
                );
        }

        $connector->token_status = 'token_valid';
        $connector->status = 'active';

        $connector->save();

        session()->forget(
            'gmail_oauth_connector_id'
        );

        return $connector;
    }
}