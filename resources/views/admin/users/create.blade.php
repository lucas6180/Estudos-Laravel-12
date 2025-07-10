@extends('admin.layouts.app')

@section('title', 'Criar novo Usuário')
@section('content')
@section('form-title', 'Cadastrar')
    <x-alert></x-alert>

    {{-- @include('admin.includes.alerts.errors') --}}
    <x-alert></x-alert>
      <form action="{{ route('users.store') }}" method="POST">
          @include('admin.users.partials.form')
      </form>
@endsection
