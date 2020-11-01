const cartas = document.querySelectorAll('.jugador');
const descripcion = document.querySelectorAll('.myDescription');
const imagenes = document.querySelectorAll('.jugador > img');
const formacion = document.querySelectorAll('.formacion');
const mails=document.querySelectorAll('.correo');
const datos=document.querySelectorAll('.datos');

for(let i = 0; i < cartas.length; i++){
    cartas[i].addEventListener('click', (e) =>{
        e.preventDefault();
        //console.log('has clickado al item ' + i);
        cartas[i].classList.toggle('modificar');
            imagenes[i].style.display='block';
            imagenes[i].style.transition='0.3s';
            formacion[i].style.display='block';
            formacion[i].style.transition='0.3s';
            mails[i].style.display='block';
            mails[i].style.transition='0.3s';
            descripcion[i].style.display='none';
            descripcion[i].style.transition='0.3s';
            datos[i].style.transition='0.3s';
            datos[i].style.display = 'block';


        if(cartas[i].classList.contains('modificar')){
            //console.log(`la card ${i} contiene a modificar`);
            imagenes[i].style.display='none';
            imagenes[i].style.transition='0.3s';
            formacion[i].style.display='none';
            formacion[i].style.transition='0.3s';
            mails[i].style.display='none';
            mails[i].style.transition='0.3s';
            descripcion[i].style.display='block';
            descripcion[i].style.transition='0.3s';
            descripcion[i].style.transform = 'rotateY(180deg)';
            datos[i].style.display = 'none';
            datos[i].style.transition='0.3s';

        }
    })
    
}
