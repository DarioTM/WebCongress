@extends('congreso.panel')

@section('panel')


 <main>
                    <div class="container-fluid">
                        
                        <ol class="breadcrumb mb-4 mt-4 d-flex align-items-center" style="background-color:#343944">
                            <li class="breadcrumb-item active "> <p class="text-white titlePanelAdmin" >Panel de administrador</p></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Ponencias</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('/panelCreatePonencia') }}">Crear Ponencia</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Comite</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('/panelCreateComite') }}">Añadir al comite</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Pagos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('/aceptar')}}">Aceptar Asistentes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Usuarios</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('/deleteUser')}}">Eliminar Usuario</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Ponencias</div>
                                    <div class="card-body">
                                        
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Titulo</th>
                                                    <th>Ponente</th>
                                                    <th>fecha</th>
                                                </tr>
                                            </thead>
                                            @foreach($ponencias as $ponencia)
                                            <tbody>
                                                <tr>
                                                    <td>{{$ponencia->id}}</td>
                                                    <td>{{$ponencia->titulo}}</td>
                                                    <td>{{$ponencia->user->name}}</td>
                                                    <td>{{$ponencia->fecha}}</td>

                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>

                                    
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Area de Pagos</div>
                                    <div class="card-body">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            @foreach($pagos as $pago)
                                                @if($pago->verificado == 1)
                                                <thead>
                                                    <tr><th>No hay ningún pago pendiente</th></tr>
                                                </thead>
                                                @else
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nombre</th>
                                                            <th>Email</th>
                                                            <th>Fecha</th>
                                                            <th>Hora</th>
                                                            <th>Verificacion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$pago->id}}</td>
                                                            <td>{{$pago->user->name}}</td>
                                                            <td>{{$pago->user->email}}</td>
                                                            <td>{{$pago->created_at->toDateString()}}</td>
                                                            <td>{{substr($pago->created_at->toTimeString(), 0, 5 )}}</td>
                                                        </tr>
                                                    </tbody>
                                                @endif
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Asistentes Confirmados</div>
                                    <div class="card-body">
                                        
                                        

                                        
                                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        
                                        @foreach($pagos as $pago)
                                        <tbody>
                                            <tr>
                                                <td>{{$pago->id}}</td>
                                                <td>{{$pago->user->name}}</td>
                                                <td>{{$pago->user->email}}</td>
                                                <td>{{$pago->created_at->toDateString()}}</td>
                                                <td>{{substr($pago->created_at->toTimeString(), 0, 5 )}}</td>
                                                @if($pago->verificado == 0)
                                                <td>No verificado</td>
                                                @else
                                                <td>Verificado</td>
                                                @endif
                                
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
                
                @endsection
