<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipament extends Model
{
    protected $table = 'equipaments';   // nome exato da tabela que você criou

    protected $fillable = [
        'name',
        'image'
    ];

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}