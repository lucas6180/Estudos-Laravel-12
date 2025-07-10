
const pesquisar = document.querySelector('#buttonPesquisar');

const listaSugestoes = document.querySelector('#sugestoes');

const barraDePesquisa = document.querySelector('#titulo');

const imgLivro = document.querySelector('#imagemLivro');

barraDePesquisa.addEventListener('input', () => {

    if (barraDePesquisa.value == 0) {
        document.querySelector('[name="sinopse"]').value = '';
        document.querySelector('[name="autor"]').value = '';
    }

    const titulo = barraDePesquisa.value.trim();
    listaSugestoes.innerHTML = '';
    if (titulo.length < 3) {
        return;
    }
    const api = `https://www.googleapis.com/books/v1/volumes?q=intitle:${encodeURIComponent(barraDePesquisa.value)}&alangRestrict=pt-br`;
    fetch(api)
        .then(response => response.json()).then(data => {
            if (data.totalItems === 0) {
                return;
            }
            listaSugestoes.classList.remove('hidden');
            data.items.slice(0, 5).forEach(item => {
                const li = document.createElement('li');
                li.textContent = item.volumeInfo.title;
                li.classList.add('p-2', 'hover:bg-gray-200', 'cursor-pointer', 'border-2', 'border-slate-700');

                li.addEventListener('click', () => {
                    barraDePesquisa.value = item.volumeInfo.title;
                    listaSugestoes.innerHTML = '';
                    imgLivro.classList.add('w-[140px]', 'border-2', 'border-white');
                    const imgSrc = item.volumeInfo.imageLinks?.thumbnail || "{{ asset('images/icon-livro.png') }}";
                    imgLivro.src = imgSrc;
                    const enderecoImg = document.querySelector('#enderecoImg');
                    enderecoImg.value = imgSrc;
                    
                });
                listaSugestoes.appendChild(li);
                document.querySelector('[name="sinopse"]').value = item.volumeInfo.description || '';
                document.querySelector('[name="autor"]').value = item.volumeInfo.authors ? item.volumeInfo.authors.join(', ') : '';
            });
        }).catch(error => {
            console.error('Erro ao buscar o livro', error);
        });
});