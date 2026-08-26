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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->json('scanned_data')->nullable();
            $table->json('suggested_data')->nullable();
            $table->json('configured_data')->nullable();
            $table->json('validation_data')->nullable();
            $table->string('file_name')->nullable(); //name from the file
            $table->longText('input_file_path');
            $table->longText('output_file_path')->nullable();
            $table->longText('other_outputs_file_path')->nullable();
            $table->string('config_name')->nullable();
            $table->enum('status', ['active', 'inactive', 'draft'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
