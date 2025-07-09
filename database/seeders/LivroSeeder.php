<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use App\Models\Livro;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = Categoria::all();
        Livro::factory()->count(20)->create()->each(function ($livro) use ($categorias) {
            $livro->categorias()->attach(
                $categorias->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
