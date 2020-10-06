const accionNuevoComentario = document.querySelector('#nuevo-comment');
const iconoFlecha = document.querySelector('#nuevo-comment > i');
const nuevoComentario = document.querySelector('.contenedor-nuevo-comentario');

accionNuevoComentario.addEventListener('click', (e) =>{
    e.preventDefault();
    nuevoComentario.classList.toggle('oculto');
    iconoFlecha.classList.toggle('voltear');
})