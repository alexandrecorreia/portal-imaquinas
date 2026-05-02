<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    protected $table = 'segments';

    protected $fillable = [
        'name',
        'description',
    ];

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}