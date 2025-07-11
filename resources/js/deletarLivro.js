import { exibirAlerta } from "./alertas";

const botaodeletar = document.querySelectorAll("#btnDeletar");
botaodeletar.forEach((button) => {
    button.addEventListener("click", async (e) => {
        const livroId = button.dataset.id;
        try {
            const response = await fetch(`/admin/books/delete/${livroId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify(),
            });
            const result = await response.json();
            if (result.success) {
                exibirAlerta(result.message);
            } else {
                exibirAlerta(result.message);
            }
        } catch (error) {
            exibirAlerta("Erro ao deletar o Livro, Tente novamente!");
        }
    });
});
