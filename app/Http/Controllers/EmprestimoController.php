<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Livro;
use App\Services\EmprestimoService;

class EmprestimoController extends Controller
{
    protected EmprestimoService $emprestimoService;

    public function __construct(EmprestimoService $emprestimoService)
    {
        $this->emprestimoService = $emprestimoService;
    }

    public function reservar($livroId)
    {
        $user = Auth::user();
        $livro = Livro::findOrFail($livroId);

        try {
            $emprestimo = $user->emprestimos()
                ->whereHas('livros', function ($query) use ($livroId) {
                    $query->where('id', $livroId);
                })
                ->whereNull('dt_devolucao')
                ->first();

            if ($emprestimo) {
                $emprestimo->livros()->detach($livroId);

                if ($emprestimo->livros()->count() === 0) {
                    $emprestimo->delete();
                }

                $livro->quantidade_disponivel++;
                $livro->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Reserva cancelada com sucesso!',
                    'reserved' => false,
                ]);
            } else {
                $this->emprestimoService->reservarLivro($user, $livro);

                return response()->json([
                    'success' => true,
                    'message' => 'Livro reservado com sucesso!',
                    'reserved' => true,
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
