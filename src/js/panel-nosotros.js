let tabs = document.querySelectorAll(".item");
let panels = document.querySelectorAll(".contenedor-informacion");

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
        
        }else if(i === 1){
            panels[1].classList.remove('non-active');
            panels[1].classList.add('active');
            panels[0].classList.add('non-active');
            panels[2].classList.add('non-active');
            panels[0].classList.remove('active');
            panels[2].classList.remove('active');
        
        }else if(i === 2){
            panels[2].classList.remove('non-active');
            panels[2].classList.add('active');
            panels[1].classList.add('non-active');
            panels[0].classList.add('non-active');
            panels[1].classList.remove('active');
            panels[0].classList.remove('active');
        }
    })
}