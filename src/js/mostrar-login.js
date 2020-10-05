const modal_login = document.getElementById('modal-login');
const cerrar_login = document.getElementById('close-login');
const btn_login = document.querySelector('#login-respon');
const btn_login2 = document.querySelector('#login-btn');


btn_login.addEventListener('click', (e) =>{
    e.preventDefault();
    console.log('tocado');
    modal_login.classList.remove('hide');
}) 
btn_login2.addEventListener('click', (e) =>{
    e.preventDefault();
    console.log('tocado');
    modal_login.classList.remove('hide');
}) 

cerrar_login.addEventListener('click', (e) =>{
    e.preventDefault();
    modal_login.classList.add('hide');
})
