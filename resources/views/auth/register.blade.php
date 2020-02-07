@extends('index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-mio text-white">{{ __('Unirse a WebCongress') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group col-md-12">
                            <label for="name" class="text-secondary text-left">{{ __('Nombre: ') }}</label>

                            
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                         
                        </div>

                        <div class="form-group col-md-12">
                            <label for="email" class="text-secondary text-left">{{ __('Email:') }}</label>

                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group col-md-12">
                            <label for="password" class="text-secondary text-left">{{ __('Contraseña:') }}</label>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                        </div>

                       <div class="form-group col-md-12">
                            <label for="password-confirm" class="text-secondary text-left">{{ __('Confirmar contraseña:') }}</label>

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        
                        </div>
                             <input type="text" class="form-control" name="type" required value="comite" style="visibility:hidden; height:0px!important">
                        <div class="form-group col-md-12">
             
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
         
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
