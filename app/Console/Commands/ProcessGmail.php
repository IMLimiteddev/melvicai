<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use Google\Client;
use Google\Service\Gmail;
use Google\Service\Gmail\MessagePart;
use Google\Service\Gmail\ModifyMessageRequest;

use App\Models\ScannedSuggestedResult;
use App\Mail\ProcessedGmailMail;

class ProcessGmail extends Command
{
    protected $signature = 'gmail:process';

    protected $description = 'Process unread Gmail emails with customer names in subject';

    public function handle()
    {
        $this->info('Starting Gmail processor...');

        /*
        |--------------------------------------------------------------------------
        | 1. Google Client
        |--------------------------------------------------------------------------
        */

        $client = new Client();

        $client->setClientId(
            config('services.gmail.client_id')
        );

        $client->setClientSecret(
            config('services.gmail.client_secret')
        );

        /*
        |--------------------------------------------------------------------------
        | Gmail token
        |--------------------------------------------------------------------------
        */

        $tokenPath = storage_path('app/google/gmail-token.json');

        if (!file_exists($tokenPath)) {

            $this->error(
                "Token not found: {$tokenPath}"
            );

            return Command::FAILURE;
        }

        $token = json_decode(
            file_get_contents($tokenPath),
            true
        );

        if (
            !$token ||
            empty($token['access_token'])
        ) {

            $this->error(
                'Invalid Gmail token.'
            );

            return Command::FAILURE;
        }

        $client->setAccessToken($token);

        $this->info(
            'Gmail token loaded successfully.'
        );

        /*
        |--------------------------------------------------------------------------
        | Refresh expired token
        |--------------------------------------------------------------------------
        */

        if ($client->isAccessTokenExpired()) {

            $refreshToken = $client->getRefreshToken();

            if (!$refreshToken) {

                $this->error(
                    'Google access token expired and no refresh token exists.'
                );

                return Command::FAILURE;
            }

            $newToken = $client->fetchAccessTokenWithRefreshToken(
                $refreshToken
            );

            if (isset($newToken['error'])) {

                $this->error(
                    'Failed to refresh Gmail token: ' .
                    ($newToken['error_description'] ?? $newToken['error'])
                );

                return Command::FAILURE;
            }

            file_put_contents(
                $tokenPath,
                json_encode(
                    $client->getAccessToken(),
                    JSON_PRETTY_PRINT
                )
            );

            $this->info(
                'Gmail token refreshed successfully.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Gmail service
        |--------------------------------------------------------------------------
        */

        $gmail = new Gmail($client);

        /*
        |--------------------------------------------------------------------------
        | 3. Get unique customer names
        |--------------------------------------------------------------------------
        */

        $customerNames = ScannedSuggestedResult::query()
            ->select('customer_name')
            ->whereNotNull('customer_name')
            ->where('customer_name', '!=', '')
            ->distinct()
            ->pluck('customer_name')
            ->toArray();

        if (empty($customerNames)) {

            $this->info(
                'No customer names found in ScannedSuggestedResult.'
            );

            return Command::SUCCESS;
        }

        /*
        |--------------------------------------------------------------------------
        | Build Gmail search query using customer names
        |--------------------------------------------------------------------------
        */

        $queries = [];

        foreach ($customerNames as $customerName) {

            $customerName = trim($customerName);

            if (!$customerName) {
                continue;
            }

            $queries[] = 'subject:"' . $customerName . '"';
        }

        if (empty($queries)) {

            $this->info(
                'No valid customer names available.'
            );

            return Command::SUCCESS;
        }

        /*
        |--------------------------------------------------------------------------
        | Search Gmail
        |--------------------------------------------------------------------------
        */

        $gmailQuery =
            'in:anywhere is:unread (' .
            implode(' OR ', $queries) .
            ')';

        $response = $gmail->users_messages->listUsersMessages(
            'me',
            [
                'q' => $gmailQuery
            ]
        );

        $messages = $response->getMessages();

        if (!$messages) {

            $this->info(
                'No unread emails found matching any customer name.'
            );

            return Command::SUCCESS;
        }

        $this->info(
            count($messages) . ' email(s) found.'
        );

        /*
        |--------------------------------------------------------------------------
        | 4. Process each Gmail message
        |--------------------------------------------------------------------------
        */

        foreach ($messages as $message) {

            $attachmentPaths = [];

            try {

                /*
                |--------------------------------------------------------------------------
                | Get complete Gmail message
                |--------------------------------------------------------------------------
                */

                $email = $gmail->users_messages->get(
                    'me',
                    $message->getId(),
                    [
                        'format' => 'full'
                    ]
                );

                $payload = $email->getPayload();

                /*
                |--------------------------------------------------------------------------
                | Get subject and sender
                |--------------------------------------------------------------------------
                */

                $headers = $payload->getHeaders();

                $subject = '';
                $from = '';

                foreach ($headers as $header) {

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

                $this->info(
                    "Processing email: {$subject}"
                );

                /*
                |--------------------------------------------------------------------------
                | 5. Match subject against customer names
                |--------------------------------------------------------------------------
                */

                $matchedCustomer = null;

                foreach ($customerNames as $customerName) {

                    $customerName = trim(
                        $customerName
                    );

                    if (!$customerName) {
                        continue;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Check if customer name exists in subject
                    |--------------------------------------------------------------------------
                    */

                    if (
                        stripos(
                            $subject,
                            $customerName
                        ) !== false
                    ) {

                        $matchedCustomer = $customerName;

                        break;
                    }
                }

                /*
                |--------------------------------------------------------------------------
                | No customer matched
                |--------------------------------------------------------------------------
                */

                if (!$matchedCustomer) {

                    $this->error(
                        "No customer found matching subject: {$subject}"
                    );

                    continue;
                }

                $this->info(
                    "Customer matched: {$matchedCustomer}"
                );

                /*
                |--------------------------------------------------------------------------
                | Find ScannedSuggestedResult
                |--------------------------------------------------------------------------
                */

                $matchedResult = ScannedSuggestedResult::query()
                    ->where(
                        'customer_name',
                        $matchedCustomer
                    )
                    ->first();

                if (!$matchedResult) {

                    $this->error(
                        "ScannedSuggestedResult not found for customer: {$matchedCustomer}"
                    );

                    continue;
                }

                $this->info(
                    "ScannedSuggestedResult ID: {$matchedResult->id}"
                );

                /*
                |--------------------------------------------------------------------------
                | 6. Get email body
                |--------------------------------------------------------------------------
                */

                $body = $this->getEmailBody(
                    $payload
                );

                /*
                |--------------------------------------------------------------------------
                | 7. Get attachments
                |--------------------------------------------------------------------------
                */

                $attachments = [];

                $this->extractAttachments(
                    $gmail,
                    $message->getId(),
                    $payload,
                    $attachments
                );

                if (empty($attachments)) {

                    $this->error(
                        "No attachment found for {$subject}"
                    );

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | 8. Process PDF attachments
                |--------------------------------------------------------------------------
                */

                $processedResults = [];

                foreach ($attachments as $attachment) {

                    $filename = basename(
                        $attachment['filename']
                    );

                    /*
                    |--------------------------------------------------------------------------
                    | Only process PDFs
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

                        $this->warn(
                            "Skipping non-PDF attachment: {$filename}"
                        );

                        continue;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Save attachment temporarily
                    |--------------------------------------------------------------------------
                    */

                    $storagePath =
                        'gmail/' .
                        uniqid() .
                        '_' .
                        $filename;

                    Storage::disk('local')->put(
                        $storagePath,
                        $attachment['data']
                    );

                    $attachmentPaths[] = $storagePath;

                    $this->info(
                        "Attachment saved: {$storagePath}"
                    );

                    /*
                    |--------------------------------------------------------------------------
                    | Get actual file path
                    |--------------------------------------------------------------------------
                    */

                    $fullPath =
                        Storage::disk('local')->path(
                            $storagePath
                        );

                    /*
                    |--------------------------------------------------------------------------
                    | Create UploadedFile
                    |--------------------------------------------------------------------------
                    */

                    $uploadedFile = new UploadedFile(
                        $fullPath,
                        $filename,
                        'application/pdf',
                        null,
                        true
                    );

                    /*
                    |--------------------------------------------------------------------------
                    | Create request
                    |--------------------------------------------------------------------------
                    */

                    $processRequest = Request::create(
                        '/process-suggested/' .
                        $matchedResult->id,
                        'POST'
                    );

                    $processRequest->files->set(
                        'file',
                        $uploadedFile
                    );

                    /*
                    |--------------------------------------------------------------------------
                    | 9. Process PDF
                    |--------------------------------------------------------------------------
                    */

                    $this->info(
                        "Processing PDF: {$filename}"
                    );

                    $controller = app(
                        \App\Http\Controllers\Admin\RulesController::class
                    );

                    $processResponse =
                        $controller->processSuggested(
                            $processRequest,
                            $matchedResult->id
                        );

                    /*
                    |--------------------------------------------------------------------------
                    | Convert response
                    |--------------------------------------------------------------------------
                    */

                    $processData =
                        $processResponse->getData(true);

                    if (
                        !isset($processData['success']) ||
                        !$processData['success']
                    ) {

                        throw new \Exception(
                            $processData['message']
                            ?? 'Document processing failed.'
                        );
                    }

                    $this->info(
                        "PDF processed successfully: {$filename}"
                    );

                    /*
                    |--------------------------------------------------------------------------
                    | Get generated TXT
                    |--------------------------------------------------------------------------
                    */

                    $txtContent =
                        $processData['txt_content']
                        ?? null;

                    $txtFile =
                        $processData['txt_file']
                        ?? null;

                    /*
                    |--------------------------------------------------------------------------
                    | Read TXT from storage if necessary
                    |--------------------------------------------------------------------------
                    */

                    if (!$txtContent && $txtFile) {

                        if (
                            Storage::disk('public')->exists(
                                $txtFile
                            )
                        ) {

                            $txtContent =
                                Storage::disk('public')->get(
                                    $txtFile
                                );
                        }
                    }

                    $processedResults[] = [
                        'filename' => $filename,
                        'txt_file' => $txtFile,
                        'txt_content' => $txtContent,
                    ];
                }

                /*
                |--------------------------------------------------------------------------
                | Make sure at least one PDF was processed
                |--------------------------------------------------------------------------
                */

                if (empty($processedResults)) {

                    throw new \Exception(
                        'No PDF attachment was successfully processed.'
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | 10. Send processed result
                |--------------------------------------------------------------------------
                */

                $this->info(
                    'Sending processed result by email...'
                );

                Mail::to(
                    'clintonace09@gmail.com'
                )->send(
                    new ProcessedGmailMail(
                        $from,
                        $subject,
                        $matchedCustomer,
                        $body,
                        $processedResults
                    )
                );

                $this->info(
                    'Processed result sent to clintonace09@gmail.com'
                );

                /*
                |--------------------------------------------------------------------------
                | 11. Mark Gmail email as read
                |--------------------------------------------------------------------------
                */

                $gmail->users_messages->modify(
                    'me',
                    $message->getId(),
                    new ModifyMessageRequest([
                        'removeLabelIds' => [
                            'UNREAD'
                        ]
                    ])
                );

                /*
                |--------------------------------------------------------------------------
                | 12. Delete temporary attachments
                |--------------------------------------------------------------------------
                */

                foreach ($attachmentPaths as $path) {

                    if (
                        Storage::disk('local')->exists(
                            $path
                        )
                    ) {

                        Storage::disk('local')->delete(
                            $path
                        );
                    }
                }

                $this->info(
                    'Email marked as read.'
                );

            } catch (\Throwable $e) {

                $this->error(
                    'Error processing email: ' .
                    $e->getMessage()
                );

                /*
                |--------------------------------------------------------------------------
                | Cleanup attachments if processing fails
                |--------------------------------------------------------------------------
                */

                foreach ($attachmentPaths as $path) {

                    if (
                        Storage::disk('local')->exists(
                            $path
                        )
                    ) {

                        Storage::disk('local')->delete(
                            $path
                        );
                    }
                }
            }
        }

        $this->info(
            'Gmail processor finished.'
        );

        return Command::SUCCESS;
    }

    /*
    |--------------------------------------------------------------------------
    | Extract email body
    |--------------------------------------------------------------------------
    */

    private function getEmailBody(MessagePart $part)
    {
        $body = '';

        if (
            $part->getBody() &&
            $part->getBody()->getData()
        ) {

            $body = $this->decodeBody(
                $part->getBody()->getData()
            );
        }

        $parts = $part->getParts();

        if ($parts) {

            foreach ($parts as $child) {

                $mimeType = $child->getMimeType();

                if (
                    $mimeType === 'text/plain' ||
                    $mimeType === 'text/html'
                ) {

                    if (
                        $child->getBody() &&
                        $child->getBody()->getData()
                    ) {

                        $body .= "\n\n" .
                            $this->decodeBody(
                                $child->getBody()->getData()
                            );
                    }
                }

                if ($child->getParts()) {

                    $body .= "\n\n" .
                        $this->getEmailBody(
                            $child
                        );
                }
            }
        }

        return trim($body);
    }

    /*
    |--------------------------------------------------------------------------
    | Extract attachments recursively
    |--------------------------------------------------------------------------
    */

    private function extractAttachments(
        Gmail $gmail,
        string $messageId,
        MessagePart $part,
        array &$attachments
    ) {

        if (
            $part->getFilename() &&
            $part->getBody()
        ) {

            $filename = $part->getFilename();

            $attachmentId =
                $part->getBody()->getAttachmentId();

            if ($attachmentId) {

                $attachment =
                    $gmail->users_messages_attachments->get(
                        'me',
                        $messageId,
                        $attachmentId
                    );

                $data = $this->decodeBody(
                    $attachment->getData()
                );

                $attachments[] = [
                    'filename' => $filename,
                    'data' => $data,
                ];
            }
        }

        $parts = $part->getParts();

        if ($parts) {

            foreach ($parts as $child) {

                $this->extractAttachments(
                    $gmail,
                    $messageId,
                    $child,
                    $attachments
                );
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Decode Gmail Base64
    |--------------------------------------------------------------------------
    */

    private function decodeBody($data)
    {
        return base64_decode(
            strtr(
                $data,
                '-_',
                '+/'
            )
        );
    }
}