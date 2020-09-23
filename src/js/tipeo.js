const typed = new Typed('.typed', {
    strings: [
        '',
        '<p>El 90% del éxito se basa simplemente en insistir.</p><p>Woody Allen.</p>',
        '<p>Las ideas creativas  son como un  capullo delicado, hay que mimarlas para que florezcan.</p><p>Daniel Coleman.</p>',
        '<p>Todo es un proceso de darse cuenta.</p> <p> Fristz Perls<p>'    
    ],
    //stringsElement: '#cadenas-texto',
    typeSpeed: 70,
    startDelay: 1000,
    backSpeed:25,
    //smartBackspace:true,
    shuffle:false,
    backDelay:10500,
    loop:true,
    loopCount: false,
    showCursorL:true,
    cursorChar: '|',
    contentType:'html',
});