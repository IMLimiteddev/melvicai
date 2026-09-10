<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Workflow;
use App\Services\WorkflowGmailService;

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
                    "Workflow {$workflow->id}: " .
                    $result['count'] .
                    " matching email(s)."
                );

            } catch (\Throwable $e) {

                $this->error(
                    "Workflow {$workflow->id} failed: " .
                    $e->getMessage()
                );
            }
        }

        return Command::SUCCESS;
    }
}