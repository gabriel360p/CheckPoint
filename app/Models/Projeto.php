<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;
    protected $fillable=[
        'producao',
        'nome',
        'user_id',
        'descricao',
        'link2Projeto',
        'link1Projeto',
    ];
}
