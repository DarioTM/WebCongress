<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AdminPanel</title>

  <!-- Bootstrap core CSS -->
  <link href="{{url('panel/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{url('assets/css/styleComun.css')}}" rel="stylesheet">
  <link href="{{url('panel/css/simple-sidebar.css')}}" rel="stylesheet">
  <link href="{{url('panel/css/stylePanel.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading titlePanel"><a href="{{url('adminPanel')}}" class="">WebCongress</a></div>
      <div class="list-group list-group-flush">
        <a href="{{url('adminPanel')}}" class="list-group-item list-group-item-action bg-light">Panel Inicial</a>
        <a href="{{ url('/panelCreatePonencia') }}" class="list-group-item list-group-item-action bg-light">Crear Ponencia</a>
        <a href="{{ url('/panelCreateComite') }}" class="list-group-item list-group-item-action bg-light">Añadir al comite</a>
        <a href="{{url('/aceptar')}}" class="list-group-item list-group-item-action bg-light">Aceptar Asistentes</a>
        <a href="{{url('/deleteUser')}}" class="list-group-item list-group-item-action bg-light">Eliminar Usuario</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><svg style="width: 20px;"class="svg-inline--fa fa-bars fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg><!-- <i class="fas fa-bars"></i> --></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--<ul class="navbar-nav">-->
            <!--  <li class="nav-item active">-->
            <!--    <a class="nav-link" href="#">Home</a>-->
            <!--  </li>-->
            <!--  <li class="nav-item">-->
            <!--    <a class="nav-link" href="#">Page 1</a>-->
            <!--  </li>-->
            <!--  <li class="nav-item">-->
            <!--    <a class="nav-link" href="#">Page 2</a>-->
            <!--  </li>-->
            <!--</ul>-->
        
            <ul class="nav navbar-nav ml-auto">
            @auth
              <li class="nav-item">
                <a class="nav-link" href="{{url('user')}}"><span class="fas fa-user"></span> {{ Auth::user()->name }}</a>
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
                <a class="nav-link" href="{{ url('register') }}"><span class="fas fa-user"></span> Registrarse</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('login') }}"><span class="fas fa-sign-in-alt"></span> Login</a>
            </li>
            
             @endauth
             
            </ul>
        </div>
      </nav>



      <div class="container-fluid">
            
        @if(\Request::get('message') !== null)
        <div class="alert alert-success message5s mt-4" role="alert">
        {{\Request::get('message')}}
        </div>
        @endif 

            @yield('panel')
            
            
            
            
      </div>
      
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{url('panel/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('panel/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script type="text/javascript" src="{{url('assets/js/main.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/deleteMessage.js')}}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
