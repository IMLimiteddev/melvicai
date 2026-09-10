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
        Schema::table('workflow_connectors', function (Blueprint $table) {
            $table->text('access_token')->nullable()->after('email_client_secret');
            $table->text('refresh_token')->nullable()->after('access_token');
            $table->text('token_expires_at')->nullable()->after('refresh_token');
        });
    }

    public function down(): void
    {
        Schema::table('workflow_connectors', function (Blueprint $table) {
            $table->dropColumn([
                'access_token',
                'refresh_token',
                'token_expires_at',
            ]);
        });
    }
};
