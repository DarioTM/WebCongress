@extends('index')

@section('content')

<div class="container d-flex flex-wrap" style="max-width: 1300px;">

    <div class="card-deck" style="width:100%">
      
      @foreach($ponencias as $ponencia)

      
      <div class="card minCard">
        
        <div class="card-body d-flex justify-content-between align-items-center" style="padding-bottom:0;">
         
          <h1 class="">{{$ponencia->titulo}}</h1>

        </div>
        <hr>
        <div class="card-body" style="padding-top:0;">
          
          <div class="row align-items-center">
            
            <div class="col-6">
              
              <div class="imgProfile" style="background-image:url('{{url('/img/' . $ponencia->iduser)}}');" ></div>
              
            </div>
            
            <div class="col-6">
              <!--Relacion belongsTo-->
              <h5>Ponente: </h5>
              <p>{{$ponencia->user->name}} </p>
              
              <h5>Email: </h5>
              <p>{{$ponencia->user->email}} </p>
              
       
            </div>
            
          </div>
          
        </div>
        <div class="card-footer">
          
            @auth
            @if(Auth::user()->type == 'asistente')

              @if(isset(($asistencia->where('idponencia', $ponencia->id)->get())[0]))
              
              <a href="{{url('/showPonencia/'.$ponencia->id)}}"  class="btn btn-primary btnPone text-white" >Finalizada <i class="fas fa-thumbs-up"></i></a>

              @else
              
              
              <a href="{{url('/showPonencia/'.$ponencia->id)}}"  class="btnPonenciasOcu"><h2>Ver Ponencia</h2></a>
              
              @endif
            @endif
          @endauth
          
          <small class="text-muted">Fecha de la ponencia {{$ponencia->fecha}}.</small>
        </div>
      </div>
     
      @endforeach

    </div>
<div class="container d-flex justify-content-center">{{$ponencias->links()}}</div>
</div>





<style type="text/css">
  .minCard{
    
    min-width:300px;
    margin-bottom:30px!important;
    
  }
  
  h1{
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
  
</style>

@endsection