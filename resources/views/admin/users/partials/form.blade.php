    <x-alert></x-alert>
    @csrf()
    <div class=" flex flex-col gap-4 w-[screen] h-[400px] justify-center items-center">
        <div>
            <h1 class="text-2xl font-medium text-red-500">@yield('form-title', 'Cadastrar Usuário')</h1>
        </div>
        <div class="flex justify-center flex-col w-4/6 gap-1">
            <label class="font-medium" for="name">Nome</label>
            <input type="text" name="name" placeholder="Insira seu Nome" value="{{ $user->name ?? old('name') }}"
                class="bg-slate-900 rounded-sm border-0 h-[48px]">
        </div>
        <div class="flex justify-center flex-col w-4/6 gap-1">
            <label class="font-medium" for="email">Email</label>
            <input type="email" name="email" placeholder="Insira seu Email"
                value="{{ $user->email ?? old('email') }} " class="bg-slate-900 rounded-sm border-0 h-[48px]">
        </div>
        <div class="flex justify-center flex-col w-4/6 gap-1">
            <label class="font-medium" for="Senha">Senha</label>
            <input type="password" name="password" placeholder="Insira sua Senha"
                class="bg-slate-900 rounded-sm border-0 h-[48px]">
        </div>
        <button type="submit"
            class="bg-red-500 rounded cursor-pointer w-4/6 h-10 font-medium hover:bg-red-700">Cadastrar</button>
    </div>
