<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['nome'=>'Manutenção']);
        Categoria::create(['nome'=>'Pesquisa']);
        Categoria::create(['nome'=>'Reunião']);
        Categoria::create(['nome'=>'Desenvolvimento Front-End']);
        Categoria::create(['nome'=>'Desenvolvimento Back-End']);
        Categoria::create(['nome'=>'Desenvolvimento']);
    }
}
