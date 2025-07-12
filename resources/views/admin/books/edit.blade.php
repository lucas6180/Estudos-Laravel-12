@extends('admin.layouts.app')

@section('title', 'Cadastrar novo Livro')
@section('content')
@section('form-title', 'Cadastrar')
@section('form-sub-title', 'Livro')

<section class="flex justify-center items-center">
    <form class="w-[615px]" id="formCadastrarLivro" method="POST">
        @include('admin.books.partials.formBook')
    </form>
</section>
@endsection
