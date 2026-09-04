<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('workflows', function (Blueprint $table) {
            $table->id();

            // Input connector
            $table->string('input_connector_id')->nullable();

            $table->string('input_name')->nullable();

            // Output connector
            $table->string('output_connector_id')->nullable();

            $table->string('output_name')->nullable();


            // Configuration
            $table->foreignId('configuration_id')
                ->constrained('configurations')
                ->cascadeOnDelete();

            $table->string('config_name');

            // Workflow information
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->unsignedInteger('usage_count')->default(0);

            $table->string('user_identifier'); // who used this workflow

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflows');
    }
};
