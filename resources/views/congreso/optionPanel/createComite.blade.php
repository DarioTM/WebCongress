
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
            
                <div class="card-header text-light bg-dark">{{ __('Añadir al comite') }}</div>
                <div class="card-body">
                    
                   <form method="POST" action="{{action('UserController@store')}}"  class="mx-auto w-100 p-3 text-white " accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf

                         <div class="form-group  col-md-12">
                           <label class="text-secondary text-left">Name:</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                         <div class="form-group  col-md-12">
                           <label class="text-secondary text-left">Email:</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  
                        </div>



                         <input type="password"  name="password" required value="0123456789abcdefghijklmnopqrstuvwxyz" style="visibility:hidden; height:0px!important">
                        
                        <input type="text" class="form-control" name="type" required value="comite" style="visibility:hidden; height:0px!important">
                        
                        <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Crear</button>
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
                                        <a class="small text-white stretched-link" href="{{url('/deleteUser')}}">Eliminar Usuario</a>
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
