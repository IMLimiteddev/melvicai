<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProcessedWorkflowFileMail extends Mailable
{
    use Queueable, SerializesModels;

    public $filePath;
    public $fileName;

    public function __construct($filePath, $fileName)
    {
        $this->filePath = $filePath;
        $this->fileName = $fileName;
    }

    public function build()
    {
        return $this
            ->subject('Processed Workflow File')
            ->view('emails.processed-workflow-file')
            ->attach(
                storage_path('app/public/' . $this->filePath),
                [
                    'as' => $this->fileName,
                ]
            );
    }
}