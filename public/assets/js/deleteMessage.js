(function(){
    var messages = document.querySelectorAll('.message5s');


    setTimeout(function(){
        for (var i = 0; i < messages.length; i++) {
            messages[i].classList.add('transitionMessage');
        }
    },5000);


    setTimeout(function(){
        for (var i = 0; i < messages.length; i++) {
            messages[i].remove();
        }
    },5300);
    

})();