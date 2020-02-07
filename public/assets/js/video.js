var player;

var video = document.getElementById('player');

var url = video.getAttribute('data-video');



// CREA EL IFRAME DONDE SE ENCUENTRE EL ID PLAYER

function onYouTubePlayerAPIReady() {
    player = new YT.Player('player', {
      videoId: url,
      playerVars: {'enablejsapi':1, 'autoplay': 1, 'controls': 0, 'disablekb':1, 'iv_load_policy':3, 'modestbranding':0, 'rel':0, 'showinfo':0, },
      events: {
        onReady: onPlayerReady,
        onStateChange: onPlayerStateChange
      }
    });
}

// INICIA EL ELEMENTO IFRAME
function onPlayerReady(event) {

  event.target.playVideo(); //INICIA EL VIDEO AUTOMATICAMENTE AL CARGAR EL IFRAME
}

// CUANDO FINALIZA EL VIDEO
function onPlayerStateChange(event) {        
    if(event.data === 0) {
      
      player.destroy(); //ELIMINA EL VIDEO

       
    }
}

