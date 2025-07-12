{{-- app.blade.php --}}
<!DOCTYPE html>
<html lang="pt-br" style="box-sizing: border-box">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>@yield('title') - Especializa TI</title>
</head>

<body class="bg-slate-950 text-white flex items-center flex-col h-screen w-screen">
    <header class="bg-black w-screen h-20 p-12 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Estudos <span class="text-red-500">Laravel</span></h1>
        @can('is-admin')
            <nav class="menu-admin w-[200px]  h-[60px] flex items-end z-50 relative">
                <div data-fechar="{{ asset('images/icon-fechar-menu.png') }}"
                    data-padrao="{{ asset('images/icon-menu.png') }}"
                    class="drop-menu  w-[100px] h-[35px] bg-no-repeat cursor-pointer"
                    style="background-image: url('{{ asset('images/icon-menu.png') }}'); background-size: 30px;">
                </div>
                <div class="menu-dropado absolute left-[0px]  right-0 top-[80px] bottom-0 w-[240px] h-[250px] hidden">
                    <ul
                        class="bg-black flex flex-col justify-center border-2 border-slate-700 border-t-0 rounded-b w-[240px]">
                        <li class="border-b-2 p-2 border-slate-700  hover:bg-slate-950 h-[45px]"><a href="/books/index"
                                class="cursor-pointer">Home</a></li>
                        <li class="border-b-2 p-2 border-slate-700   hover:bg-slate-950 h-[45px]"><a
                                href="/admin/books/create" class="cursor-pointer">Cadastro de livros</a></li>
                        <li class="p-2 border-slate-700  hover:bg-slate-950 h-[45px]"><a href="/admin/users"
                                class="cursor-pointer">Painel de usuários</a></li>
                    </ul>
                </div>
            </nav>
        @endcan
    </header>
    <div class="py-10 gap-8 flex flex-col w-full h-full">
        @yield('content')
    </div>
</body>

</html>

@vite('resources/js/menuAdmin.js')
@vite('resources/js/curtirLivros.js')
@vite('resources/js/reservarLivro.js')
@vite('resources/js/alertas.js')
@vite('resources/js/verLivro.js')
@vite('resources/js/deletarLivro.js')
@vite('resources/js/editarLivro.js')
