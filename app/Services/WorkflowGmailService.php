<?php

namespace App\Services;

use Carbon\Carbon;
use Exception;
use Google\Client;
use Google\Service\Gmail;
use Illuminate\Http\Request;

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
        | 1. Get workflow input connector
        |--------------------------------------------------------------------------
        */

        // dd($workflow);

        $inputConnectorIds = is_array($workflow->input_connector_id)
            ? $workflow->input_connector_id
            : json_decode($workflow->input_connector_id, true);

        if (!is_array($inputConnectorIds)) {
            $inputConnectorIds = [$workflow->input_connector_id];
        }

        $inputConnector = \App\Models\WorkflowConnector::whereIn(
            'id',
            array_filter($inputConnectorIds)
        )
            ->where('type', 'input')
            ->whereRaw('LOWER(name) = ?', ['email'])
            ->first();

        if (!$inputConnector) {
            throw new \Exception(
                'No Email input connector found for workflow ' . $workflow->id
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 2. Authenticate Gmail connector
        |--------------------------------------------------------------------------
        */

        $auth = $this->authenticateConnector($inputConnector);

        $gmail = $auth['gmail'];


        /*
        |--------------------------------------------------------------------------
        | 3. Count ALL unread emails in Inbox
        |--------------------------------------------------------------------------
        */

        $inboxResponse = $gmail->users_messages->listUsersMessages(
            'me',
            [
                'q' => 'in:inbox is:unread',
            ]
        );

        $inboxUnreadCount = count($inboxResponse->getMessages() ?? []);


        /*
        |--------------------------------------------------------------------------
        | 4. Search unread PDF-CONVERTER emails
        |    Include Inbox + Spam + Trash
        |--------------------------------------------------------------------------
        */

        $pdfResponse = $gmail->users_messages->listUsersMessages(
            'me',
            [
                'q' => 'in:anywhere is:unread subject:"PDF-CONVERTER"',
                'includeSpamTrash' => true,
            ]
        );

        $pdfConverterCount = count($pdfResponse->getMessages() ?? []);


        /*
        |--------------------------------------------------------------------------
        | 5. Get message details
        |--------------------------------------------------------------------------
        */

        $messages = $pdfResponse->getMessages() ?? [];

        $emailData = [];

        foreach ($messages as $message) {

            $email = $gmail->users_messages->get(
                'me',
                $message->getId(),
                [
                    'format' => 'full',
                ]
            );

            $payload = $email->getPayload();

            $subject = '';
            $from = '';

            foreach ($payload->getHeaders() as $header) {

                $headerName = strtolower($header->getName());

                if ($headerName === 'subject') {
                    $subject = trim($header->getValue());
                }

                if ($headerName === 'from') {
                    $from = trim($header->getValue());
                }
            }

            $emailData[] = [
                'message_id' => $message->getId(),
                'subject'    => $subject,
                'from'       => $from,
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | 6. Return results
        |--------------------------------------------------------------------------
        */

        return [
            'count' => $pdfConverterCount,

            'inbox_unread_count' => $inboxUnreadCount,

            'pdf_converter_count' => $pdfConverterCount,

            'emails' => $emailData,
        ];
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