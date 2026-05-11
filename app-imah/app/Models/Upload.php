<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploads';

    protected $fillable = [
        'type',
        'original_name',
        'generated_name',
        'path',
        'description',
    ];
}