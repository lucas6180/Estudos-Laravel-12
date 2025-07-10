import { exibirAlerta } from './alertas.js';



const formCadastrarLivro = document.querySelector('#formCadastrarLivro');
const imagemLivro = document.querySelector('#imagemLivro');
formCadastrarLivro.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(formCadastrarLivro);
    const data = Object.fromEntries(formData.entries());

    try{
        const response = await fetch("/admin/books/store", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if(result.success){
            imagemLivro.src = imagemLivro.dataset.imagemPadrao;
            exibirAlerta(result.message);
            formCadastrarLivro.reset();
        }else{
            exibirAlerta(result.message || 'Erro ao cadastrar livro.');
        }
    } catch (error) {
        exibirAlerta('Erro ao cadastrar livro. Tente novamente.');
    }
});