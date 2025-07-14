@extends('admin.layouts.app')

@section('title', 'Criar novo Usuário')
@section('content')
@section('form-title', 'Cadastrar')
    <x-alert></x-alert>

    {{-- @include('admin.includes.alerts.errors') --}}
    <x-alert></x-alert>
      <section class="s-screen flex justify-center">
          <form action="{{ route('users.store') }}" class="w-[600px]" method="POST">
              @include('admin.users.partials.form')
          </form>
      </section>
@endsection
