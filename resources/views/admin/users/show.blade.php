@extends('admin.layouts.app')

@section('title', 'Editar o Usuário')

@section('content')
    <x-alert></x-alert>

    @can('is-admin')
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="flex justify-center">
            @csrf
            @method('DELETE')
            <div class="border-2 border-red-500 w-3/6 flex justify-center flex-col items-center h-[400px] gap-2 rounded">
                <img src="{{ asset('images/img-user.webp') }}" alt="" class="w-64 h-64">
                <ul>
                    <li><span class="font-medium">Nome:</span> {{ $user->name }}</li>
                    <li><span class="font-medium">Email:</span> {{ $user->email }}</li>
                </ul>
                <button type="submit" class="bg-red-500 w-64 h-9 rounded font-medium hover:bg-red-700">Deletar</button>
            </div>
        </form>
    @endcan
@endsection
