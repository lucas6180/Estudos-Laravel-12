const botaoCurtir = document.querySelectorAll('.btn-curtir');

botaoCurtir.forEach(button => {
    button.addEventListener('click', async (e) => {
        e.preventDefault();

        const livroId = button.dataset.livroId;
        const imgPreenchido = button.dataset.imgPreenchido;
        const imgVazio = button.dataset.imgVazio;

        const response = await fetch(`/books/curtir/${livroId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({}),
        });

        if (response.ok) {
            if (button.style.backgroundImage.includes(imgPreenchido)) {
                button.style.backgroundImage = `url(${imgVazio})`;
            } else {
                button.style.backgroundImage = `url(${imgPreenchido})`;
            }
        } else {
            alert('Erro ao curtir');
        }
    });
});
