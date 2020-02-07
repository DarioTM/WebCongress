@extends('congreso.panel')

@section('panel')
<main>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Asistentes confirmados</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Tipo</th>
                                <th>Eliminar Usuarios</th>
       
                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tbody>
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->type}}</td>
                                <td>
                                    <form action="{{action('UserController@destroy')}}" method="post" >
                                        @csrf
                                        <input type="text" name="id" value="{{$user->id}}" style="visibility:hidden; height:0px!important; width:0px!important">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>

                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection


 <script type="text/javascript" src="{{url('assets/js/main.js')}}"></script>