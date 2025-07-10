@extends('admin.layouts.app')

@section('title', 'Index')
@section('content')

    <section class="flex p-4 gap-6 flex-col w-full h-full  ">
       <x-alert/>
        <div class="cards flex flex-wrap items-center gap-y-16">
            @foreach ($livros as $livro)
                <div class="w-[280px] h-[350px] flex flex-col items-center justify-center gap-3">
                    <img id="imgLivro" class="w-[200px] h-[240px] border-2 border-white" src="{{ $livro->imagem }}"
                        alt="">
                    <div id="tituloLivro" class="w-[200px] h-[60px] flex justify-center text-center font-medium items-center">{{ $livro->titulo }}</div>
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
