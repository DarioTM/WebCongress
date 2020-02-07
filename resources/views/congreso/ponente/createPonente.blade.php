@extends('index')

@section('content')

                        
<div class="col-md-3">

    <div class="card mb-4">
    
        <div class="card-header text-light bg-dark" style="background-color: #010214!important;">{{ __('Crear Ponente') }}</div>
        <div class="card-body">
        
        <form method="POST" action="{{action('UserController@storePonente')}}"  class="mx-auto w-100 p-3 text-white " accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group  col-md-12">
            <label class="text-secondary text-left">Nombre:</label>
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
              <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
            @enderror
            
            </div>
            
            
            
            <input type="password"  name="password" required value="0123456789abcdefghijklmnopqrstuvwxyz" style="visibility:hidden; height:0px!important">
            
            <input type="text" class="form-control" name="type" required value="ponente" style="visibility:hidden; height:0px!important">
            
            <div class="form-group col-md-12">
            <button type="submit" class="btn btn-info">Crear</button>
            </div>
            
            </div>
        </form>
    </div>   
</div>
                        

@endsection