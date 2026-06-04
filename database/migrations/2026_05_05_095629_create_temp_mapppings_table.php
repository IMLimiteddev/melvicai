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
        Schema::create('temp_mapppings', function (Blueprint $table) {
            $table->id();
            $table->string('mapping_id')->unique();
            $table->longText('response_data')->nullable();
            $table->string('customer')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('user_id')->nullable();
            $table->longText('submitted_json')->nullable();
            $table->string('processed_file')->nullable();
            $table->string('generated_text_file')->nullable();
            $table->string('generated_json_file')->nullable();
            $table->string('parsed_structure_file')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_mapppings');
    }
};
