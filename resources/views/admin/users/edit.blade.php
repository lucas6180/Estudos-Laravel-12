@extends('admin.layouts.app')

@section('title', 'Editar o Usuário')
@section('content')
@section('form-title', 'Editar Usuário')
<x-alert></x-alert>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @method('PUT')
        @include('admin.users.partials.form')
    </form>
@endsection

