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
       

        Schema::create('workflow_connectors', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->enum('type', ['input', 'output']);

            $table->string('account_email')->nullable();

            $table->string('email_client_id')->nullable();
            $table->string('email_client_secret')->nullable();
            $table->string('token_status')->default('token_not_set');
            $table->string('status')->nullable(); // active, inactive, error
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_connectors');
    }
};
