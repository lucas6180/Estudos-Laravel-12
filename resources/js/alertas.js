

export function exibirAlerta(mensagem) {
    const campoAlerta = document.querySelector(".campo-alerta");
    const aviso = campoAlerta.querySelector(".conteudo-aviso p");
    aviso.innerText = mensagem;
    campoAlerta.style.display = "flex";

    const btnOk = campoAlerta.querySelector(".botao-ok");
    btnOk.addEventListener("click", () => {
        campoAlerta.style.display = "none";
    });
   
}