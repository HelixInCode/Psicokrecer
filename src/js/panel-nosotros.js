let tabs = document.querySelectorAll(".item");
let panels = document.querySelectorAll(".contenedor-informacion");
let contador = 0;
let regalo = document.querySelector(".contenedor-regalo");
let boton = document.querySelector("#boton-regalo");
let btn_regalo = document.querySelector('#bt-enviar-regalo');
let enviado = document.querySelector('#enviado');

for(let i=0; i<tabs.length ; i++){
    tabs[i].addEventListener('click', function(event){
        event.preventDefault();
        console.log(`clickaste tab ${i}`);

        if(i === 0){

            panels[0].classList.remove('non-active');
            panels[0].classList.add('active');
            panels[1].classList.add('non-active');
            panels[2].classList.add('non-active');
            panels[1].classList.remove('active');
            panels[2].classList.remove('active');
        
            contador++;
        }else if(i === 1){
            panels[1].classList.remove('non-active');
            panels[1].classList.add('active');
            panels[0].classList.add('non-active');
            panels[2].classList.add('non-active');
            panels[0].classList.remove('active');
            panels[2].classList.remove('active');
            contador++;
        
        }else if(i === 2){
            panels[2].classList.remove('non-active');
            panels[2].classList.add('active');
            panels[1].classList.add('non-active');
            panels[0].classList.add('non-active');
            panels[1].classList.remove('active');
            panels[0].classList.remove('active');
            contador++;
        }
        console.log(contador);
        if(contador>2){
            console.log('te ganaste el regalo');
            regalo.classList.remove('non-active');
            regalo.classList.add('active');
        }
    })
    
}

boton.addEventListener('click', (e) =>{
    e.preventDefault();
    console.log('te entrego el regalo');
    document.getElementById('modal-message-sent').classList.toggle('hide');
})

btn_regalo.addEventListener('click', (e) =>{
    e.preventDefault();
    document.getElementById('modal-message-sent').classList.toggle('hide');
    enviado.classList.remove('non-active');
    enviado.classList.add('active');
})