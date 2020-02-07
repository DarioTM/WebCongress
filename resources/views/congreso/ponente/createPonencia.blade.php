@extends('index')

@section('content')



                        

                        
    <div class="col-md-5">
        
        <div class="card mb-4">

        <div class="card-header text-light bg-mio">{{ __('Crear Ponencia') }}</div>
        <div class="card-body">
            
           <form method="POST" action="{{action('PonenciaController@storePo')}}"  class="mx-auto w-100 p-3 text-white " accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                
                
                <input type="text" name="iduser" value="{{Auth::user()->id}}" style="visibility:hidden; height:0px!important">
                
                
                <div class="form-group col-md-12">
                    <label class="text-secondary text-left">Titulo:</label>
                    <input type="text"  class="form-control col-md-12" name="titulo" placeholder="Titulo" />
                    @error('titulo')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>

             
                <div class="form-group col-md-12">
                    <label class="text-secondary text-left">URL Video:</label>
                    <input type="text"  class="form-control" name="video" placeholder="Ingresa la URL del Video" />
                </div>
                
                  <div class="form-group col-md-12">
                    <label class="text-secondary text-left">Fecha de la ponencia:</label>
                    <input type="date"  class="form-control" name="fecha" />
                </div>
                <div class="form-group col-md-12">
                  <input type="submit" value="crear" class="btn btn-info mt-3">
                  <a href="{{url('/')}}" class="btn btn-info mt-3">Volver</a>
                </div>
                </div> 
            </form>
        </div>   
    </div>


                        
 

@endsection
