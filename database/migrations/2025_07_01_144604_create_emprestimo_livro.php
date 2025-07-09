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
        Schema::create('emprestimo_livro', function (Blueprint $table) {
            $table->foreignId('emprestimo_id')->constrained('emprestimos');
            $table->foreignId('livro_id')->constrained('livros');         
            $table->primary(['emprestimo_id', 'livro_id']);       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimo_livro');
    }
};
