<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome'=>'paulo',
            'email'=>'calueto@gmail.com',
            'endereco'=>'Angola',
            'logradouro'=>'rua x',
            'cep'=>'rua fuck',
            'bairro'=>'camama'
        ]);
    }
}
