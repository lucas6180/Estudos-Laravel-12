const livros = document.querySelectorAll("#tituloLivro");
livros.forEach((livro) => {
    livro.addEventListener("click", () => {
        return window.location.href = `/books/${livro.dataset.livroid}`;
    });
});
