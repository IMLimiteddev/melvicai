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
        Schema::create('scanned_suggested_results', function (Blueprint $table) {
            $table->id();
            $table->json('scanned_data')->nullable();
            $table->json('suggested_data')->nullable();
            $table->longText('file_url');
            $table->longText('txt_file')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('file_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scanned_suggested_results');
    }
};
