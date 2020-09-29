const $menuItems = document.getElementsByClassName('enlaces')[0];
const $menuOverlay = document.getElementsByClassName('menu-overlay')[0];
const $hamburger = document.getElementById('hamburger');

/* $hamburger.addEventListener('click', ()=>{
    console.log('resolucion: ' + screen.width);
  if($menuItems.classList.contains('hide')){

    $menuItems.classList.remove('hide')
    $menuOverlay.classList.remove('hide')
    
  }else if(!$menuItems.classList.contains('hide')){
    
    $menuItems.classList.add('hide')
    $menuOverlay.classList.add('hide')
  }
})
$menuOverlay.addEventListener('click', ()=>{
  if(!$menuItems.classList.contains('hide')){
    
    $menuItems.classList.add('hide')
    $menuOverlay.classList.add('hide')
  }
}) */
$hamburger.addEventListener('click', ()=>{
    $menuOverlay.classList.toggle('hide');
    $menuItems.classList.toggle('hide');
})