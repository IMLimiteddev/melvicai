<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkflowActivationTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfPath;

    public function __construct($pdfPath)
    {
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this
            ->subject('PDF-CONVERTER')
            ->view('emails.workflow-activation-test')
            ->attach(
                storage_path('app/public/' . $this->pdfPath)
            );
    }
}