<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = [
    'scanned_data',
    'suggested_data',
    'configured_data',
    'validation_data',

    'file_name',
    'config_name',

    'status',

    'output_file_path',
    'other_outputs_file_path',
    'input_file_path',
    'user_id'
    ];

    protected $casts = [
        'scanned_data'   => 'array',
        'suggested_data' => 'array',
        'configured_data' => 'array',
        'validation_data' => 'array'
    ];
}
