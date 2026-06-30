<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verb extends Model
{
    protected $fillable = [
    'verb',
    'type',
    'meaning',
    'user_id',
];
}
