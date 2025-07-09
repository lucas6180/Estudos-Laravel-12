<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categoria_livro', function (Blueprint $table) {
            $table->foreignId('livro_id')->constrained('livros');
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->primary(['livro_id', 'categoria_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_livro');
    }
};
