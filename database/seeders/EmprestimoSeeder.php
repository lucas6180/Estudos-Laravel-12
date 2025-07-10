<?php

namespace Database\Seeders;

use App\Models\Emprestimo;
use App\Models\Livro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmprestimoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $livros = Livro::all();
    Emprestimo::factory()->count(20)->create()->each(function($emprestimo) use ($livros){
        $emprestimo->livros()->attach(
            $livros->random(rand(1,3))->pluck('id')->toArray()
        );
    });
    }
}
