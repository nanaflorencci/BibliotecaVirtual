<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;
    protected $fillable =[
        'titulo',
        'autor',
        'data_lancamento',
        'editora',
        'sinopse',
        'genero',
        'avaliacao',
    ];
}
