<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    
    public function run(): void
    {
        Produto::create([
            'nome'=>'Computador pro',
            'valor'=>'20.00'
        ]);
    }
}
