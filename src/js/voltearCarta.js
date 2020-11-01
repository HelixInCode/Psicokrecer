const cartas = document.querySelectorAll('.jugador');

for(let i = 0; i < cartas.length - 1; i++){
    cartas[i].addEventListener('click', (e) =>{
        e.preventDefault();
        console.log('has clickado al item ' + i);
    })
    
}