@extends('admin.layouts.app')

@section('title', 'Index')
@section('content')

    <section class="flex p-4 gap-6 flex-col w-full h-full  ">
        <x-alert />
        <div class="cards flex flex-wrap items-center gap-y-16 px-12 pb-10">
            @foreach ($livros as $livro)
                <div class="w-[280px] h-[350px] flex flex-col items-center justify-center gap-3">
                    <img id="imgLivro" class="w-[200px] h-[240px] border-2 borde'r-white" src="{{ $livro->imagem }}"
                        alt="">
                    <div id="tituloLivro" data-livroId="{{ $livro->id }}"
                        class="w-[200px] h-[60px] flex justify-center text-center font-medium items-center cursor-pointer hover:text-blue-600 hover:underline hover:font-normal">
                        {{ $livro->titulo }}</div>
                    <div class="flex gap-1">
                        @can('is-admin')
                            <button id="btnEditar" class="w-[100px] h-[35px] rounded-sm bg-cover bg-no-repeat text-left px-5 bg-[70px]  bg-slate-700 hover:bg-slate-500"
                                style="background-image: url('{{ asset('images/icon-editar.png') }}'); background-size: 18px;" 
                                data-id="{{$livro->id}}">Editar
                            </button>
                            <button id="btnDeletar" class="w-[100px] h-[35px] rounded-sm bg-cover bg-no-repeat text-left px-3 bg-[70px]  bg-slate-700 hover:bg-slate-500"
                                style="background-image: url('{{ asset('images/icon-lixeira.png') }}'); background-size: 18px;" 
                                data-id="{{$livro->id}}">Deletar
                            </button>
                        @else
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
                        @endcan

                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
