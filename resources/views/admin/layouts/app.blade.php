{{-- app.blade.php --}}
<!DOCTYPE html>
<html lang="en" style="box-sizing: border-box">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>@yield('title') - Especializa TI</title>
</head>
<body class="bg-slate-950 text-white flex items-center flex-col h-screen w-screen">
    <header class="bg-black w-screen h-20 p-12 flex items-center">
        <h1 class="text-2xl font-semibold">Estudos <span class="text-red-500">Laravel</span></h1>
    </header>
    <div class="py-10 gap-8 flex flex-col w-full h-full">
        @yield('content')
    </div>
</body>
</html>