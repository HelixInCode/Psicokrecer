const btnUser = document.getElementById('user-btn');
const btnUserRespon = document.getElementById('user-respon');
const modalUser = document.getElementById('modal-user');

btnUser.addEventListener('click', (e) =>{
    e.preventDefault();
    modalUser.classList.toggle('posicion-escondido');
    modalUser.classList.toggle('posicion-mostrar');
});

btnUserRespon.addEventListener('click', (e) =>{
    e.preventDefault();
    modalUser.classList.toggle('posicion-escondido');
    modalUser.classList.toggle('posicion-mostrar');
})
