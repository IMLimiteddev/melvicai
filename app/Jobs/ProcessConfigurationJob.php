<?php

namespace App\Jobs;

use App\Models\Configuration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessConfigurationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 900;

    public $tries = 1;

    protected $configurationId;
    protected $payload;

    public function __construct($configurationId, $payload)
    {
        $this->configurationId = $configurationId;
        $this->payload = $payload;
    }

    public function handle()
    {
        set_time_limit(900);

        $config = Configuration::findOrFail(
            $this->configurationId
        );

        Log::info('QUEUE JOB STARTED', [
            'configuration_id' => $config->id,
            'time' => now()->toDateTimeString(),
        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | MARK AS PROCESSING
            |--------------------------------------------------------------------------
            */

            $config->update([
                'status' => 'inactive',
                'process_stage' => 'Processing configuration...',
            ]);

            /*
            |--------------------------------------------------------------------------
            | GET INPUT FILE
            |--------------------------------------------------------------------------
            */

            $storedPath = $config->input_file_path;

            $file = storage_path(
                'app/public/' . $storedPath
            );

            $originalName = $config->file_name;

            if (!file_exists($file)) {

                throw new \Exception(
                    'Configuration input file could not be found.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | RULE ENGINE
            |--------------------------------------------------------------------------
            */

            $baseUrl = config(
                'services.rule_engine.base_url'
            );

            Log::info('QUEUE RULE ENGINE REQUEST STARTED', [
                'configuration_id' => $config->id,
                'file' => $file,
                'file_size' => filesize($file),
            ]);

            $start = microtime(true);

            $response = Http::connectTimeout(30)
                ->timeout(600)
                ->attach(
                    'file',
                    file_get_contents($file),
                    $originalName
                )
                ->post(
                    "{$baseUrl}/docs/schworer/new-rule-3",
                    [
                        'config' => json_encode($this->payload),
                    ]
                );

            $duration = round(
                microtime(true) - $start,
                2
            );

            Log::info('QUEUE RULE ENGINE RESPONSE RECEIVED', [
                'configuration_id' => $config->id,
                'status' => $response->status(),
                'successful' => $response->successful(),
                'duration_seconds' => $duration,
            ]);

            if (!$response->successful()) {

                throw new \Exception(
                    'Rule engine returned status: '
                    . $response->status()
                );
            }

            /*
            |--------------------------------------------------------------------------
            | PARSE RESPONSE
            |--------------------------------------------------------------------------
            */

            $data = $response->json();

            $filename = $data['Mapped_txt_file'] ?? null;

            if (!$filename) {

                throw new \Exception(
                    'Mapped_txt_file was not returned by the rule engine.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | DOWNLOAD GENERATED TXT
            |--------------------------------------------------------------------------
            */

            $downloadUrl =
                "{$baseUrl}/download/output_file/"
                . rawurlencode($filename);

            Log::info('QUEUE TXT DOWNLOAD STARTED', [
                'configuration_id' => $config->id,
                'filename' => $filename,
                'download_url' => $downloadUrl,
            ]);

            $downloadStart = microtime(true);

            $txtResponse = Http::connectTimeout(30)
                ->timeout(600)
                ->get($downloadUrl);

            $downloadDuration = round(
                microtime(true) - $downloadStart,
                2
            );

            Log::info('QUEUE TXT DOWNLOAD COMPLETED', [
                'configuration_id' => $config->id,
                'status' => $txtResponse->status(),
                'successful' => $txtResponse->successful(),
                'duration_seconds' => $downloadDuration,
            ]);

            if (!$txtResponse->successful()) {

                throw new \Exception(
                    'Failed to download generated TXT file. Status: '
                    . $txtResponse->status()
                );
            }

            /*
            |--------------------------------------------------------------------------
            | SAVE GENERATED TXT
            |--------------------------------------------------------------------------
            */

            $storagePath = 'config/' . $filename;

            $fullStoragePath = storage_path(
                'app/public/' . $storagePath
            );

            $directory = dirname($fullStoragePath);

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            file_put_contents(
                $fullStoragePath,
                $txtResponse->body()
            );

            /*
            |--------------------------------------------------------------------------
            | UPDATE CONFIGURATION
            |--------------------------------------------------------------------------
            */

            $config->update([
                'configured_data'  =>
                    $data['Submitted_config_json'] ?? null,

                'validation_data' =>
                    $data['Validation_Warnings'] ?? null,

                'output_file_path' =>
                    $storagePath,

                'status' =>
                    'active',

                'process_stage' =>
                    'Scanned Processed and Saved.',

                'filename' =>
                    $filename,
            ]);

            Log::info('QUEUE JOB COMPLETED', [
                'configuration_id' => $config->id,
                'status' => $config->status,
                'filename' => $filename,
                'time' => now()->toDateTimeString(),
            ]);

        } catch (\Throwable $e) {

            Log::error('QUEUE JOB FAILED', [
                'configuration_id' => $config->id,
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'time' => now()->toDateTimeString(),
            ]);

            $config->update([
                'status' => 'inactive',
                'process_stage' => 'Processing failed.',
            ]);

            throw $e;
        }
    }
}