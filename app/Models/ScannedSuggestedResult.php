<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScannedSuggestedResult extends Model
{
    protected $fillable = [
    'scanned_data',
    'suggested_data',
    'file_url',
    'customer_name',
    'file_name',
    'txt_file',
    ];

    protected $casts = [
        'scanned_data'   => 'array',
        'suggested_data' => 'array',
    ];
}
