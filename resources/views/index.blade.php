<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Laravel</title>
        <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet"><!--problema-->
        <link href="{{url('assets/css/styleComun.css')}}" rel="stylesheet"><!--problema-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    </head>
    <body>
    
        <nav class="navbar navbar-expand-md back-red navbar-dark sticky-top">
          <a class="navbar-brand" href="#">WebCongress</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navb" class="navbar-collapse collapse hide">
             
            <ul class="navbar-nav">
              
              <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Inicio</a>
              </li>
              @auth
              <li class="nav-item">
                <a class="nav-link" href="{{url('/ponencias')}}">Ponencias</a>
              </li>
              @endauth
              
              
              @auth
              @if(Auth::user()->type == 'comite')
              <li class="nav-item">
                <a class="nav-link" href="{{url('/createPonente')}}">Crear Ponente</a>
              </li>
              @endif
              @endauth
              
              
              @auth
              @if(Auth::user()->type == 'ponente')
              <li class="nav-item">
                <a class="nav-link" href="{{url('/createPonencia')}}">Crear Ponencia</a>
              </li>
              @endif
              @endauth
            </ul>
        
            <ul class="nav navbar-nav ml-auto">
            @auth
            

              <li class="nav-item">

                <a class="nav-link" href="{{url('profile/'.Auth::user()->id)}}"><span class="fas fa-user"></span> {{ Auth::user()->name }}  </a>

              </li>
              <li class="nav-item">
                <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-success my-2 my-sm-0">
                        {{ __('Salir') }}
                    </button>
                </form>
                
              </li>
            @else
            

            
            <li class="nav-item">
              <button class="btn btn-success text-white">
                <a class="text-white" href="{{ url('register') }}">Asistir</a>
                </button>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('login') }}"><span class="fas fa-sign-in-alt"></span> Login</a>
            </li>
          
            
             @endauth
             

             
             
            </ul>
          </div>
        </nav>

        
        <div class="AreadeMensajes">
        

            @if(\Request::get('activarpago') !== null)
            <button type="button" class="btn btn-info position-absolute" style="top:0px; right:50px">
                <a class="nav-link text-white" href="{{ url('pago') }}"><i class="fas fa-euro-sign"></i></span> Pagar</a>
            </button>
            @endif
            
            @if(\Request::get('pagado') !== null)
            <button type="button" class="btn btn-info position-absolute" style="top:0px; right:50px">
            <i class="fas fa-thumbs-up"></i> Verificado
            </button>
            @endif
          
            @if(\Request::get('message') !== null)
            <div class="alert alert-success message5s" role="alert" style="width:50%!important">

            {{\Request::get('message')}}
            </div>
            @endif 
            


          
        </div>

        <div class="backPrin">                
            <!-- contenido a rellenar -->

            @yield('content')
        </div>

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script><!-- problema -->
    <script type="text/javascript" src="{{url('assets/js/main.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/deleteMessage.js')}}"></script>
</html>