const botaoRevelar = document.querySelectorAll(".btnRevelar");
const inputpassword = document.querySelectorAll(".password");
inputpassword.forEach((input) => {
    botaoRevelar.forEach((button) => {
        input.addEventListener("input", () => {
            if (input.value.trim() == "") {
                button.classList.add("hidden");
            } else {
                button.classList.remove("hidden");
            }
                button.addEventListener("click", () => {
                    if (button.classList.contains("oculto")) {
                        input.type = "text";
                        button.src = button.dataset.aberto;
                        button.classList.remove('oculto');
                    } else {
                        input.type = "password";
                        button.src = button.dataset.fechado;
                        button.classList.add('oculto');
                    }
                });
            
        });
    });
});
