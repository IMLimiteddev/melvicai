<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Workflow;
use App\Services\WorkflowGmailService;
use Illuminate\Support\Facades\Log;

class ProcessActiveWorkflows extends Command
{
    protected $signature = 'workflows:process';

    protected $description = 'Process active email workflows';

    public function handle(WorkflowGmailService $gmailService)
    {
        $workflows = Workflow::where('status', 'active')
            ->get();

        foreach ($workflows as $workflow) {

            try {

                /*
                |--------------------------------------------------------------------------
                | EMAIL → EMAIL
                |--------------------------------------------------------------------------
                */

                if ($workflow->pair_code === 'EM_IN-EM_OUT') {

                    $result = $this->processEmailToEmail(
                        $workflow,
                        $gmailService
                    );

                    $this->info(
                        'Workflow #' . $workflow->id .
                        ' | Found: ' . $result['count'] .
                        ' | Processed: ' . $result['processed'] .
                        ' | Failed: ' . $result['failed']
                    );

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | OTHER WORKFLOW PAIRS
                |--------------------------------------------------------------------------
                */

                // if ($workflow->pair_code === 'DU_IN-DD_OUT') {

                //     $this->processDeviceUploadToDeviceDownload(
                //         $workflow
                //     );

                //     continue;
                // }


                /*
                |--------------------------------------------------------------------------
                | UNSUPPORTED PAIR
                |--------------------------------------------------------------------------
                */

                // $this->warn(
                //     'Workflow #' . $workflow->id .
                //     ' has unsupported pair: ' .
                //     $workflow->pair_code
                // );

                $this->warn(
                    'Workflow #' . $workflow->id .
                    ' has unsupported pair: ' .
                    ($workflow->pair_code ?? 'EMPTY')
                );

                continue;

            } catch (\Throwable $e) {

                Log::error(
                    'Workflow processing failed',
                    [
                        'workflow_id' => $workflow->id,
                        'configuration_id' => $workflow->configuration_id,
                        'pair_code' => $workflow->pair_code,
                        'error' => $e->getMessage(),
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                        'trace' => $e->getTraceAsString(),
                    ]
                );

                $this->error(
                    'Workflow ' . $workflow->id .
                    ' failed: ' . $e->getMessage()
                );
            }
        }

        return Command::SUCCESS;
    }

    private function processEmailToEmail($workflow, WorkflowGmailService $gmailService) 
    {
        $subject = $workflow->subject ?? 'PDF-CONVERTER';

        return $gmailService->checkWorkflowEmails(
            $workflow,
            $subject
        );
    }
}