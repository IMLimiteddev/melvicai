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

                $result = $gmailService->checkWorkflowEmails($workflow);

                $this->info(
                    'Workflow #' . $workflow->id .
                    ' | Found: ' . $result['count'] .
                    ' | Processed: ' . $result['processed'] .
                    ' | Failed: ' . $result['failed']
                );

            } catch (\Throwable $e) {

               Log::error(
                    'Workflow processing failed',
                    [
                        'workflow_id' => $workflow->id,
                        'configuration_id' => $workflow->configuration_id,
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
}