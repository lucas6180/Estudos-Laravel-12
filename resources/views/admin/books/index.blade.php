@extends('admin.layouts.app')

@section('title', 'Index')
@section('content')

    <section class="flex p-4 gap-6 flex-col w-full h-full">
        <div class="campo-alerta absolute  w-full h-[350px] flex justify-center items-center backdrop-blur-sm bg-slate-950 bg-opacity-20">
            <div class="erros relative bg-slate-700 w-[350px] h-[180px] flex flex-col items-center p-4 rounded-sm shadow-lg">
                <div class="aviso w-full h-[35px] flex gap-2 items-center">
                    <img class="w-[25px]" src="{{ asset('images/icon-alerta.png') }}" alt="">
                    <p class="font-medium text-white">Aviso</p>
                </div>
                <div class="conteudo-aviso w-full h-[95px] flex items-center justify-center p-2">
                    <p class="font-medium"></p>
                </div>
                <div class="w-full h-[45px] flex items-center justify-center">
                    <button  class="botao-ok bg-red-500 hover:bg-red-600 w-[80px] h-[35px] rounded-sm">Ok</button>
                </div>
            </div>
        </div>
        <div class="cards flex">
            @foreach ($livros as $livro)
                <div class="w-[280px] h-[350px] flex flex-col items-center justify-center gap-3">
                    <img id="imgLivro" class="w-[200px] h-[240px] border-2 border-white" src="{{ $livro->imagem }}"
                        alt="">
                    <div id="tituloLivro">{{ $livro->titulo }}</div>
                    <div class="flex gap-1">
                        @if (in_array($livro->id, $livrosReservadosIds))
                            <button data-livro-id="{{ $livro->id }}"
                                style="background-image: url('images/icon-load.gif'); background-size: 20px;"
                                class="reservar botaorReservar bg-slate-400 w-[155px] h-[35px] rounded-sm font-medium">
                                Reservado
                            </button>
                        @else
                            <button data-livro-id="{{ $livro->id }}"
                                data-loader-url="{{ asset('images/icon-load.gif') }}"
                                style="background-image: url('{{ asset('images/icon-load.gif') }}'); background-size: 20px; background-repeat: no-repeat; background-position: center;"
                                class="reservar botaorReservar bg-red-500 w-[155px] h-[35px] rounded-sm font-medium hover:bg-red-600">
                                Reservar
                            </button>
                        @endif
                        <button type="button" data-livro-id="{{ $livro->id }}"
                            data-img-preenchido="{{ asset('images/icon-coracao-preenchido.png') }}"
                            data-img-vazio="{{ asset('images/icon-coracao-vazio.png') }}"
                            class="btn-curtir bg-slate-700 w-[40px] h-[35px] rounded-sm bg-cover bg-no-repeat bg-center"
                            style="background-image: url('{{ in_array($livro->id, $livrosCurtidosIds) ? asset('images/icon-coracao-preenchido.png') : asset('images/icon-coracao-vazio.png') }}'); background-size: 23px;">
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @vite('resources/js/curtirLivros.js')
    @vite('resources/js/reservarLivro.js')
    @vite('resources/js/alertas.js')
@endsection
