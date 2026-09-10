<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowConnector extends Model
{
    
        protected $fillable = [
        'name',
        'type',
        'account_email',
        'email_client_id',
        'email_client_secret',
        'access_token',
        'refresh_token',
        'token_expires_at',
        'token_status',
        'status',
    ];
}
