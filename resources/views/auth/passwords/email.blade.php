@extends('index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-mio text-white">{{ __('Resetear Contraseña') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group col-md-12">
                            <label for="email" class="text-secondary text-left">{{ __('Email:') }}</label>

                         
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                     
                        </div>

                        <div class="form-group col-md-12">
                    
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>
                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
