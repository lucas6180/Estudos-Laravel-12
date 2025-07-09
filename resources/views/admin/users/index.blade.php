@extends('admin.layouts.app')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-xl font-medium">Usuários</h1>
        <a href="{{ route('users.create') }}" class="bg-red-500 p-2 rounded-sm hover:bg-red-700 hover:text-white font-medium">Novo Usuário</a>
    </div>
    <x-alert></x-alert>


    <table class="border-separate border-spacing-2">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="border-separate border-spacing-2">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="bg-red-500 p-2 rounded-sm cursor-pointer font-medium hover:bg-red-700"><a href="{{ route('users.edit', $user->id) }}">Editar</a></td>
                    <td class="bg-red-500 p-2 rounded-sm cursor-pointer font-medium hover:bg-red-700"><a href="{{ route('users.show', $user->id) }}">Detalhes</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum usuário encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
