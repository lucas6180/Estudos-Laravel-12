const botaoEditar = document.querySelectorAll('#btnEditar');
botaoEditar.forEach(button =>{
    button.addEventListener('click', ()=>{
        const livroId = button.dataset.id;
        window.location.href = `/admin/books/edit/${livroId}`;
    })
});