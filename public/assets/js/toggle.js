window.onload = function(){

    let enlace = document.querySelectorAll('.enlace');  
    for (var x = 0; x < enlace.length; x++) {
        enlace[x].addEventListener('click', seleccionPaisajes);
    }

    function seleccionPaisajes(e) {
        var lista = document.querySelector(e.target.dataset.toggle);
        lista.classList.toggle('open');
        e.preventDefault();
    }

    
}


