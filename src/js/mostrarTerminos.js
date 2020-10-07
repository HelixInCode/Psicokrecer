const tabs = document.querySelectorAll('.tabs-terminos > .item');
const seccion = document.querySelectorAll('.contenedor-secciones > .secciones');

for(let i=0; i<tabs.length ; i++){
    tabs[i].addEventListener('click', function(event){
        event.preventDefault();
        console.log(`clickaste tab ${i}`);

        if(i === 0){

            seccion[0].classList.remove('d-none');
            seccion[0].classList.add('d-block');
            seccion[1].classList.add('d-none');
            seccion[1].classList.remove('d-block');
        }else if(i === 1){
            seccion[1].classList.remove('d-none');
            seccion[1].classList.add('d-block');
            seccion[0].classList.add('d-none');
            seccion[0].classList.remove('d-block');
        }
    })
    
}