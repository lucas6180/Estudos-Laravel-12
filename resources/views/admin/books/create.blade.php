@extends('admin.layouts.app')

@section('title', 'Cadastrar novo Livro')
@section('content')
@section('form-title', 'Cadastrar')
@section('form-sub-title', 'Livro')
      <form action="{{route('book.store')}}" method="POST">
          @include('admin.books.partials.formBook')
      </form>
@endsection
