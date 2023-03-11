<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    use HasFactory;

    protected $fillable=[
        'aberta',
        'user_id',

        'projeto_id',

        'categoria_id',
        'finalidades',
        'abertura',

        'fechamento',
        'feitos'
    ];
}
