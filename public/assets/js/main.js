(function(){
    var form = document.querySelectorAll('.destroy');


    for (var i = 0; i < form.length; i++) {

        form[i].addEventListener('click', function(e){
        
        let confirmacion = confirm('¿Seguro que desea borrar el producto?');
        
        if(!confirmacion){
            e.preventDefault();
        }
        });

}
})();