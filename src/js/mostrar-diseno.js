const selectDiseno = document.querySelector('#diseno');
const formularios = document.querySelectorAll('.formularios-item');

const showSelect = (e) =>{

    if(selectDiseno.value == 1){//muestra diseño 1
        console.log(selectDiseno.value);
        formularios[0].classList.remove('d-none');
        formularios[1].classList.add('d-none');
        formularios[2].classList.add('d-none');
    }
    if(selectDiseno.value == 2){//muestra diseño 2
        console.log(selectDiseno.value);
        formularios[1].classList.remove('d-none');
        formularios[0].classList.add('d-none');
        formularios[2].classList.add('d-none');
    }
    if(selectDiseno.value == 3){//muestra diseño 3
        console.log(selectDiseno.value);
        formularios[2].classList.remove('d-none');
        formularios[0].classList.add('d-none');
        formularios[1].classList.add('d-none');
    }
}