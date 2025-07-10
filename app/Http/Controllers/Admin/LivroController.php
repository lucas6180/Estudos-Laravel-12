<?php

namespace App\Http\Controllers\Admin;

use App\Models\Emprestimo;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::all();
        $user = Auth::user();
        $isAdmin = $user->isAdm();
        $livrosCurtidosIds = $user->livrosCurtidos()->pluck('livro_id')->toArray();

        $emprestimosAtivos = $user->emprestimos()->whereNull('dt_devolucao')->with('livros')->get();

        $livrosReservadosIds = $emprestimosAtivos->flatMap(function ($emprestimo) {
            return $emprestimo->livros->pluck('id');
        })->unique()->toArray();

        return view("admin.books.index", compact('livros', 'livrosReservadosIds', 'livrosCurtidosIds', 'isAdmin'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.books.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $livro = Livro::create($request->validated());

        return response()->json([
            'success' => (bool) $livro,
            'message' => $livro ? 'Livro cadastrado com sucesso!' : 'Erro ao cadastrar livro.',
        ], $livro ? 200 : 500);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livro = Livro::findOrFail($id);
        $categoria = $livro->categorias()->first();
        return view('admin.books.show', compact('livro', 'categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $emprestimosAtivos = Emprestimo::whereNull('dt_devolucao')
    ->whereHas('livros', function($query) use ($id) {
        $query->where('livro_id', $id);
    })
    ->first();

    if ($emprestimosAtivos) {
        return response()->json([
            'success'=> false,
            'message' => "Erro! O livro possui emprestimos ativos"
        ]);
    }
        $livro = Livro::findOrFail($id);
        $livro->categorias()->detach();
        $livro->delete();
        return response()->json([
            "success"=> true,
            "message"=> "Livro deletado com sucesso!"
        ]);
    }

    public function curtir($livroId)
    {
        $user = Auth::user();

        if ($user->livrosCurtidos()->where('livro_id', $livroId)->exists()) {
            $user->livrosCurtidos()->detach($livroId);
        } else {
            $user->livrosCurtidos()->attach($livroId);
        }
        return back();
    }
}
