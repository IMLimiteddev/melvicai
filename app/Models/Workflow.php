<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    protected $fillable = [
        'input_connector_id',
        'input_name',
        'output_connector_id',
        'output_name',
        'configuration_id',
        'config_name',
        'status',
        'usage_count',
        'user_identifier',
    ];
}
