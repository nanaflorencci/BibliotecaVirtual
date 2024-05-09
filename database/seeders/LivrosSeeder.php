<?php

namespace Database\Seeders;

use App\Models\Livros;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++){
            Livros::create([
                'titulo' => 'titulox'.$i,
                'autor'=> 'autorx'.$i,
                'data_lancamento'=> '2010-10-10'.$i,
                'editora'=> 'editorax'.$i,
                'sinopse'=> 'sinopsex'.$i,
                'genero'=> 'generox'.$i,
                'avaliacao'=> 'avaliacaox'.$i
            ]);
        }
    }
}
