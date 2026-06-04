<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempMappping extends Model
{
     protected $fillable = [
        'customer',
        'processed_file',
        'generated_text_file',
        'generated_json_file',
        'response_data',
        'mapping_id',
        'user_id',
        'submitted_json',
        'parsed_structure_file',
        'pdf',

    ];

    protected $casts = [
        'response_data' => 'array',
        'submitted_json' => 'array',
    ];
}
