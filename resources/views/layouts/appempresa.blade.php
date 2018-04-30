<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('../images/logoVetor.png') }}" type="image/x-icon">
    <title>{{ __('EmployTec') }}</title>

 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('../css/bootstrap.min.css') }}">
    <!-- Google Fonts -->
    <!--link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"-->
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="{{ asset('../css/simple-line-icons.css') }}">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="{{ asset('../css/themify-icons.css') }}">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="{{ asset('../css/set1.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">

    <!-- Bootstrap core CSS-->
  
  <!-- Custom fonts for this template-->
  <link href="{{ asset('../vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{ asset('../vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('../css/sb-admin.css') }}" rel="stylesheet">
<style>

.fixed {
   background: #252a33;
  opacity: 1;
}
.slider {
  background: #fff;
  background-size: cover;
  min-height: 800px;
}
</style>
</head>
<body>
    <div class="nav-menu">
        <div class="bg transition">
            <div class="container-fluid fixed">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img  width="25%;" src="{{ asset('../images/logo.png') }}">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('vagas') }}">{{ __('VAGAS') }}</a>
                                    </li>
                                    
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('empresas') }}">{{ __('EMPRESA') }}</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('sobrenos') }}">{{ __('SOBRE NÓS') }}</a>
                                    </li>
                                    
                                    <!--li class="nav-item dropdown">
                                        <a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Login
                    <span class="icon-arrow-down"></span>
                  </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('login') }}">Candidato</a>
                                            <a class="dropdown-item" href="{{ route('register') }}">Empresa</a>
                                          
                                        </div>
                                    </li-->
                                    @guest
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        LOGIN
                                            <span class="icon-arrow-down"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('login') }}">Candidato</a>
                                            <a class="dropdown-item" href="{{ route('empresa.login') }}">Empresa</a>
                                        </div>
                                    </li>
                                    <li><a href="{{ route('empresa.register') }}" class="btn btn-outline-light top-btn">
                                        <span class="ti-plus"></span>{{ __('CADASTRE-SE') }} </a>
                                    </li>
                                    @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>  
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('home') }}">
                                        {{ __('Cadastrar Vagas') }}
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('empresa.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('empresa.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>
        <section class="slider d-flex align-items-center">
        <!-- <img src="images/slider.jpg" class="img-fluid" alt="#"> -->

                        @yield('content')

        </section>
    </main>    
</body>
</html>
