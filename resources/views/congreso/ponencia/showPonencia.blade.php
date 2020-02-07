@extends('index')

@section('content')

<div class="container d-flex flex-wrap" style="max-width: 1500px;">

    <div class="card-deck" style="width:100%">
      
      <div class="card minCard">
        
        <div class="card-body d-flex justify-content-between align-items-center" style="padding-bottom:0;">
          
          <h1 class="">{{$ponencia->titulo}}</h1>
          

          
        </div>
        <hr>
        <div class="card-body row" style="padding-top:0;">
          
          <div class="col-4 align-items-center">
            
            <div class="col-12 ">
              
              <div class="imgProfile" style="background-image:url('{{url('/img/' . $ponencia->iduser)}}');" ></div>
              
            </div>
            
            <div class="col-12 mt-4">
            
            <div class="row align-items-center justify-content-center mb-2">
              <h4>Ponente: </h4>
              <h4 class="text-gris"> &nbsp {{$ponencia->user->name}} </h4>
            </div>
            <div class="row align-items-center justify-content-center ">
              <h4>Email: </h4>
              <h4 class="text-gris"> &nbsp {{$ponencia->user->email}} </h4>
            </div> 
       
            </div>
            
          </div>
          
           <div class=" col-8 align-items-center">
               
            
            <div id="player" data-video="{{$url}}" >
              
    
              <h1>¡Enhorabuena!</h1>
              <h3>Has finalizado la ponencia</h3>
              <h3>Pinche en el siguiente boton para recibir su certificado</h3>
              <a href="{{action('PonenciaController@certificado', $ponencia->id)}}"  class="btn btn-success btnCert">Recibir certificado</a>
              
            </div>
          
          
          </div>
          
        </div>
        <div class="card-footer">
          <small class="text-muted">Fecha de la ponencia {{$ponencia->fecha}}.</small>
        </div>
      </div>


    </div>

</div>


<script src="http://www.youtube.com/player_api"></script>

<script type="text/javascript" src="{{url('assets/js/video.js')}}"></script>

<style type="text/css">
  .minCard{
    
    min-width:300px;
    margin-bottom:30px!important;
    
  }
  
  h1,h2,h3,h4,h5{
    margin:0px!important;
  }
  
  html,body{
    height:initial!important;
  }
  
  .backPrin{
    min-height:100vh;
    background-repeat: repeat-y;
  }
  
  .btnPone{
    height:40px;
  }
  
  .text-gris{
      color:#f77e7e;
  }
  
  
  
  #player{
    
    position:relative;
    width:100%;
    height:100%;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    
  }
  
  #player h1{
    
    font-size:4em;
  }
  
    #player h3{
    
      margin-bottom:10px!important;
  }
  
  
  .btnCert{
    margin-top:30px;
  }
  
  
  
  
   / Track /
#track {
  -webkit-appearance: none;
  -moz-apperance: none;
  border-radius: 6px;
  height: 6px;
  vertical-align: middle;
  background-image: -webkit-gradient(
    linear,
    left top,
    right top,
    color-stop(0, #c0392b),
    color-stop(0, #ecf0f1)
  );
  outline: none;
}

/ Botón del track /
#track::-webkit-slider-thumb {
  -webkit-appearance: none !important;
  background-color: #E9E9E9;
  border: 1px solid #CECECE;
  height: 15px;
  width: 15px;
  border-radius: 50%;
}
  
  
  
  
  
  
  
  
</style>

@endsection