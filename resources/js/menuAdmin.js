const dropMenus = document.querySelectorAll(".drop-menu");
const menuDroppeds = document.querySelectorAll(".menu-dropado");

dropMenus.forEach((dropMenu) => {
    menuDroppeds.forEach((menuDropped) => {
        dropMenu.addEventListener("click", () => {
            if (menuDropped.classList.contains("hidden")) {
                menuDropped.classList.remove("hidden");
                dropMenu.style.backgroundImage = `url(${dropMenu.dataset.fechar})`;
                return;
            }
            dropMenu.style.backgroundImage = `url(${dropMenu.dataset.padrao})`;
            menuDropped.classList.add("hidden");
        });
    });
});
