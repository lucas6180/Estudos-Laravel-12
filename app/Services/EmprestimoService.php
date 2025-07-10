<?php

namespace App\Services;

use App\Models\Emprestimo;
use App\Models\User;
use App\Models\Livro;
use Illuminate\Support\Facades\DB;

class EmprestimoService{

    public function reservarLivro(User $user, Livro $livro){
        if($livro->quantidade_disponivel < 1){
            throw new \Exception('Livro Indisponivél no momento, tente novamente outra hora.');
        }
        $emprestimosAtivos = $user->emprestimos()->whereNull('dt_devolucao')->count();
        if($emprestimosAtivos == 2){
            throw new \Exception('Você possui 2 Livros emprestados. Devolva para fazer outras reservas.');
        }
        $multas = $user->emprestimos()->where('multa_atraso', '>', 0)->count();
        if($multas > 0){
            throw new \Exception('Você possui multas por atraso. Realize o pagamento para regularizar o seu cadastro.');
        }
          DB::transaction(function() use ($user, $livro) {
        $livro->quantidade_disponivel--;
        $livro->save();

        $emprestimo = Emprestimo::create([
            'user_id' => $user->id,
            'dt_emprestimo' => now(),
            'dt_devolucao' => null,
            'multa_atraso' => 0
        ]);
        $emprestimo->livros()->attach($livro->id);
    });
}
}