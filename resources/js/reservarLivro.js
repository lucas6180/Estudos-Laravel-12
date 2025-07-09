const botaoReservar = document.querySelectorAll(".botaorReservar");
botaoReservar.forEach((button) => {
    button.style.backgroundImage = "none";
    button.addEventListener("click", async (e) => {
        e.preventDefault();

        const originalText = button.innerText;
        button.style.backgroundImage = `url(${button.dataset.loaderUrl})`;
        button.style.backgroundSize = "20px";
        button.style.backgroundRepeat = "no-repeat";
        button.style.backgroundPosition = "center";
        button.innerText = "";

        const livroId = button.dataset.livroId;

        try {
            const response = await fetch(`/books/reservar/${livroId}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({}),
            });

            const data = await response.json();
            button.style.backgroundImage = "none";

            if (response.ok && data.success) {
                if (data.reserved) {
                    button.style.backgroundColor = "#94a3b8"; // slate-400
                    button.innerText = "Reservado";
                    button.classList.remove("reservar");
                } else {
                    button.style.backgroundColor = "#ef4444"; // red-500
                    button.innerText = "Reservar";
                    button.classList.add("reservar");
                }
            } else {
                console.error(data.message || "Erro ao reservar o livro");
                exibirAlerta(data.message);
                button.innerText = originalText;
            }
        } catch (error) {
            console.error("Erro na requisição:", error);
            button.style.backgroundImage = "none";
            button.innerText = originalText;
        }
    });
});

function exibirAlerta(mensagem) {
    const campoAlerta = document.querySelector(".campo-alerta");
    const aviso = campoAlerta.querySelector(".conteudo-aviso p");
    aviso.innerText = mensagem;
    campoAlerta.style.display = "flex";

    const btnOk = campoAlerta.querySelector(".botao-ok");
    btnOk.addEventListener("click", () => {
        campoAlerta.style.display = "none";
    });
   
}