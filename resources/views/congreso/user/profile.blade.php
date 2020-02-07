@extends('index')

@section('content')

    
<div class="row container d-flex justify-content-center ">
    <div class="cardMio d-flex justify-content-center align-items-center ">
        
         <div class="col col-sm-5">

            <div class="imgProfile" style="background-image:url('{{url('/img/' . $user->id)}}');" >

             <form method="POST" action="{{action('UserController@subirProfile')}}"  class="inputIMG " accept-charset="UTF-8" enctype="multipart/form-data" id="formProfile">
                 @csrf
                 <input type="text" name="id" value="{{$user->id}}" class="inputIMG" onchange="this.form.submit()">
                 <input type="file" name="file" onchange="this.form.submit()" class="inputIMG">
                 <input type="submit" class="button" value="Cambiar Foto" class="inputIMG">
             </form>

            </div>
    
        </div>
          
        <div class="col col-sm-5 datosPersonales">
            <h1>{{$user->name}}</h1>
            <p><strong>Email: </strong>{{$user->email}}</p>
            <p><strong>Tipo: </strong> {{$user->type}}</p>
            @if($user->type == 'asistente')
            <p><strong>Ponencias Realizadas: </strong>{{$asistencia}} </p>
            @endif
            <button class="btn btn-info">Editar</button>
            @if (Route::has('password.request'))
            <a class="btn btn-warning text-white" href="{{ route('password.request') }}">Cambiar Contraseña</a>
            @endif
        </div> 
    </div>
</div>



 
 
                                                    
@endsection


