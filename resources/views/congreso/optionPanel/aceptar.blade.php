@extends('congreso.panel')

@section('panel')


<div class="row">

    <div class="col-xl-12 mt-3">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Area de Pagos</div>
            <div class="card-body">
                
                

                
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                        <th>Comprobante</th>
                        <th>Aceptar</th>
                        <th>Rechazar</th>
                    </tr>
                </thead>
                @inject('user', 'App\User')
                @foreach($pagos as $pago)
                <tbody>
                    
                    <tr>
                        <td>{{$pago->id}}</td>
                        <td>{{$pago->iduser}}</td>
                        <td>{{( $user->where('id', $pago->iduser)->get() )[0]->name }}</td>
                        <td>{{( $user->where('id', $pago->iduser)->get() )[0]->email }}</td>
                        <td>{{$pago->created_at->toDateString()}}</td>
                        <td>{{substr($pago->created_at->toTimeString(), 0, 5 )}}</td>
                        @if($pago->verificado == 0)
                        <td>No verificado</td>
                        @else
                        <td>Verificado</td>
                        @endif
                        <td><button class="btn btn-info"><a href="{{url('/pago/' . $pago->iduser)}}" class="text-white enlace" data-toggle="#com{{$pago->id}}">Abrir</a></button></td>
                        
                        <td>
                            <form method="POST" action="{{action('PagoCongresoController@update')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="text" name="id" value="{{$pago->id}}" style="visibility:hidden; height:0px!important; width:0px!important">
                                <button type="submit" class="btn btn-success">Aceptar</button>
                            </form>
                        </td>
                        
                        <td>
                            <form action="{{action('PagoCongresoController@destroy')}}" method="post" >
                                @csrf
                                <input type="text" name="id" value="{{$pago->id}}" style="visibility:hidden; height:0px!important; width:0px!important">
                                <button type="submit" class="btn btn-danger">Rechazar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                
                <div class="abrir" id="com{{$pago->id}}"> 
                    <embed src="{{url('/pago/' . $pago->iduser)}}" type="application/pdf" width="100%" height="600"   >
                    <button class="btn btn-danger"><a href="{{url('/pago/' . $pago->iduser)}}" class="text-white enlace" data-toggle="#com{{$pago->id}}">Cerrar</a></button>
                </div>   
                @endforeach
                
            </table>
            

            </div>
        </div>
    </div>
</div>




          
<style type="text/css">
    td{
        text-align:center;
    }
    

    
.abrir{
    display: none;
}

.abrir.open{
    display: block;
}

</style>         
           
<script type="text/javascript" src="./assets/js/toggle.js"></script>           
                                 
@endsection
