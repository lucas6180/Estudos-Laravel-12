@csrf()
<div class=" flex flex-col gap-4 w-[screen] h-[950px] justify-center items-center">
    
    <x-alert></x-alert>
        <div>
            <h1 class="text-2xl font-medium text-white">
                @yield('form--title', 'Cadastrar')
                <span class=" text-red-500">@yield('form-sub-title', 'Livro')</span>
            </h1>

        </div>
        <div>
            <img id="imagemLivro" data-imagemPadrao="{{ asset('images/icon-livro.png') }}" src="{{ asset('images/icon-livro.png') }}" class="w-[150px] h-[150px] bg-cover">
        </div>
        <div class="flex justify-center flex-col w-4/6 gap-1">
            <label for="titulo" class="font-medium">Titulo</label>
            <div>
                <input required placeholder="Insira o titulo do Livro" type="text" name="titulo" id="titulo"
                    autocomplete="off" class="bg-slate-900 rounded-sm border-0 w-[406px] h-[48px] bg-no-repeat"
                    style="background-image: url('{{ asset('images/search.png') }}'); background-size: 20px 20px; background-position: 370px;">
                <ul id="sugestoes" class="absolute hidden bg-white text-black w-[406px]">
            </div>

            </ul>
        </div>

        <div class="flex justify-center flex-col w-4/6 gap-1">
            <label for="sinopse" class="font-medium">Sinopse</label>
            <textarea name="sinopse" rows="5" class="bg-slate-900 rounded-sm border-0 p-3" placeholder="Insira a Sinopse"></textarea>
        </div>
        <input required class="hidden" type="text" id="enderecoImg" name="imagem">
        <div class="flex justify-center flex-col w-4/6 gap-1">
            <label for="categoria" class="font-medium">Categoria</label>
            <select name="categoria_id" id="categoria" class="bg-slate-900 rounded-sm border-0 h-[48px] text-white">
                <option value="" disabled selected>Selecione a categoria</option>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->tipo }}</option>
                @endforeach
            </select>

        </div>
        <div class="flex justify-center flex-col w-4/6 gap-1">
            <label for="autor" class="font-medium">Autor</label>
            <input required placeholder="Insira o Autor do livro" type="text" name="autor"
                class="bg-slate-900 rounded-sm border-0 h-[48px]">
        </div>
        <div class="flex justify-center flex-col w-4/6 gap-1">
            <label for="quant_total" class="font-medium">Quantidade Total</label>
            <input required placeholder="Insira a quantidade total" type="number" name="quantidade_total"
                class="bg-slate-900 rounded-sm border-0 h-[48px]">
        </div>
        <div class="flex justify-center flex-col w-4/6 gap-1">
            <label for="quant_disp" class="font-medium">Quantidade disponível</label>
            <input required placeholder="Insira a quantidade disponivel" type="number" name="quantidade_disponivel"
                class="bg-slate-900 rounded-sm border-0 h-[48px]">
        </div>
        <button type="submit"
            class="bg-red-500 rounded cursor-pointer w-4/6 h-10 font-medium hover:bg-red-700">Cadastrar</button>
    </div>
    @vite('resources/js/ApiBook.js')
    @vite('resources/js/cadastrarLivro.js')
    @vite('resources/js/alertas.js')
