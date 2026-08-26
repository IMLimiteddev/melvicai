<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessedGmailMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $fromEmail,
        public string $originalSubject,
        public string $customer,
        public string $emailBody,
        public array $processedResults
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Processed: ' . $this->originalSubject
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.processed-gmail'
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        foreach ($this->processedResults as $result) {

            if (
                empty($result['txt_file']) ||
                !Storage::disk('public')->exists(
                    $result['txt_file']
                )
            ) {
                continue;
            }

            $attachments[] = Attachment::fromPath(
                Storage::disk('public')->path(
                    $result['txt_file']
                )
            )->as(
                basename($result['txt_file'])
            );
        }

        return $attachments;
    }
}