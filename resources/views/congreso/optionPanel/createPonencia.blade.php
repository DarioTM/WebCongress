@extends('congreso.panel')

@section('panel')




 <main>
                    <div class="container-fluid">
                        <h2 class="mt-4">Panel de administrador</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Backend</li>
                        </ol>
                        
                        
                        
                        <div class="row">
                        
                        <div class="col-md-7">
                            
                            <div class="card mb-4">
            
                            <div class="card-header text-light bg-dark">{{ __('Crear Ponencia') }}</div>
                            <div class="card-body">
                                
                               <form method="POST" action="{{action('PonenciaController@store')}}"  class="mx-auto w-100 p-3 text-white " accept-charset="UTF-8" enctype="multipart/form-data">
                                    @csrf
                                    
                                     <div class="form-group  col-md-12">
                                       <label class="text-secondary text-left">Ponente:</label>
                                        <select name="iduser" class="form-control">
                                          <option >Selecciona un Ponente</option>
                 
                                          @foreach ($users as $user) { }
                                          <option value="{{$user->id}}" >{{$user->id}}-{{$user->name}}</option>
                
                                          @endforeach
                                        </select>
                                    </div>
                                    
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
                        
                        <div class="col-md-5">
                            <div class="">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Ponencias</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('/panelCreatePonencia') }}">Crear Ponencia</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Comite</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('/panelCreateComite') }}">Añadir al comite</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Aceptar Asistente</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       <a class="small text-white stretched-link" href="{{url('/aceptar')}}">Aceptar Asistentes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Expulsar Usuario</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('/deleteUser')}}">Eliminar Usuario</a>/a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        

                        </div>


                            
                            
                        </div>
                    </div>
                </main>


@endsection
