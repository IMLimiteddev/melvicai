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
        Schema::create('manual_processors', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('original_name')->nullable();
            $table->longText('batch')->nullable();
            $table->longText('path');
            $table->longText('txt_files')->nullable();
            $table->longText('excel')->nullable();
            $table->longText('pdf')->nullable();
            $table->longText('base_file')->nullable();
            $table->text('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manual_processors');
    }
};
