@extends('admin.layouts.app')

@section('title', 'Cadastrar novo Livro')
@section('content')
    <section class="flex justify-center gap-40 items-start">
        <div class="detalheslivro flex flex-col items-center justify-center">
            <div class="capaLivro w-[360px] h-[460px] border-4">
                <img src="{{ $livro->imagem }}" class="w-full h-full object-cover" alt="">
            </div>
            <div class="flex flex-col">
                <div class="tituloLivro bg-slate-900 w-[360px] h-[100px] flex flex-col gap-2 p-8 rounded-sm justify-center ">
                    <h1 class="text-2xl font-medium text-white">Titulo</h1>
                    <p class="text-lg text-gray-300">{{ $livro->titulo }}</p>
                </div>
                <div class="autorLivro w-[360px] h-[100px] flex flex-col gap-2 bg-slate-900 p-8 rounded-sm justify-center">
                    <h1 class="text-2xl font-medium text-white">Autor</h1>
                    <p class="text-lg text-gray-300">{{ $livro->autor }}</p>
                </div>
                <div class="categoriaLivro w-[360px] h-[100px] flex flex-col gap-2 bg-slate-900 p-8 rounded-sm justify-center">
                    <h1 class="text-2xl font-medium text-white">Categoria</h1>
                    <p class="text-lg text-gray-300">{{ $categoria->tipo}}</p>
                </div>
            </div>
        </div>
        <div class="sinopseLivro w-[600px] flex flex-col gap-2 bg-slate-900 p-8 rounded-sm">
            <h2 class="text-xl font-medium text-white">Sinopse</h2>
            <p class="text-gray-300">{{ $livro->sinopse }}</p>
        </div>
    </section>
@endsection
