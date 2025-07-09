const btnOk = document.querySelectorAll('.botao-ok');
const campoAlerta = document.querySelectorAll('.campo-alerta');
campoAlerta.forEach(alerta => {
    btnOk.forEach(button =>{
        button.addEventListener('click', ()=>{
            alerta.style.display = 'none';
        });
    });
});