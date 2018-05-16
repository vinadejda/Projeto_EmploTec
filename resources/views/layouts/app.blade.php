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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('../css/bootstrap.min.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="{{ asset('../css/simple-line-icons.css') }}">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="{{ asset('../css/themify-icons.css') }}">
    <!-- Hover Effects -->
    <!--link rel="stylesheet" href="{{ asset('../css/set1.css') }}"-->
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../scss/style.scss') }}">

    <link href="{{ asset('css/agency.min.css') }} " rel="stylesheet">

    <!-- Bootstrap core CSS-->



 <!--link href="{{ asset('css/agency.min.css') }}" rel="stylesheet"-->




  
  <!-- Custom fonts for this template-->
  <link href="{{ asset('../vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{ asset('../vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('../css/sb-admin.css') }}" rel="stylesheet">
<style>
    main{
        margin-top: 74px;
    }
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
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script type="text/javascript">
     $(document).ready(function($){
        $('#telefone').mask('(00) 0000-0000');
        $('#celular').mask('(00) 0000-00009');
        $('#celular').blur(function(event){
            if ($(this).val().length == 15){
                  $('#celular').mask('(00) 00000-0009');  
            }else{
                $('#celular').mask('(00) 0000-00009');
            }

            })
    });
</script>

</head>
<body>
    <nav class="nav-menu" style="z-index: 200;">
        <div class="bg transition">
            <div class="container-fluid fixed">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img  width="25%;" src="{{ asset('../images/logo.png') }}" alt="Logo EmployTec">
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
                                    <li class="nav-item active" style="width: 112px;">
                                        <a class="nav-link" href="{{ url('sobrenos') }}">{{ __('SOBRE NÓS') }}</a>
                                    </li>
                                    
                                    <!-- Authentication Links -->
                                    @if(auth()->guard('empresa')->check())
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>  
                                                {{ Auth::guard('empresa')->user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('dashboard-empresa') }}">
                                                    {{ __('Área da Empresa') }}
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
                                    @elseif(auth()->guard('web')->check())
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>  
                                                {{ Auth::guard('web')->user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('dashboard-candidato') }}">
                                                    {{ __('Área do Candidato') }}
                                                </a>
                                                
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                        @elseif(auth()->guard('admin')->check())
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>  
                                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('dashboard-admin') }}">
                                                    {{ __('Área do Administrador') }}
                                                </a>
                                                
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @else
                                        <li class="nav-item dropdown" style="width: 101px;">
                                            <a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('LOGIN') }}
                                                <span class="icon-arrow-down"></span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('login') }}">Candidato</a>
                                                <a class="dropdown-item" href="{{ route('empresa.login') }}">Empresa</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown" style="width: 149px;">
                                            <a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('CADASTRE-SE') }}
                                                <span class="icon-arrow-down"></span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('register') }}">Candidato</a>
                                                <a class="dropdown-item" href="{{ route('empresa.register') }}">Empresa</a>
                                            </div>
                                        </li>
                                    @endif
                                 </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </nav>
        <main class="container">
            @yield('content')
        </main>
    </div>
    
    <!--= FOOTER =-->
    <footer class=" dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright &copy; 2018 EmployTec.</p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <ul>
                            <li><a href="#"><span class="ti-facebook"></span></a></li>
                            <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                            <li><a href="#"><span class="ti-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--//END FOOTER -->

    <!-- jQuery, Bootstrap JS. -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script>
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });

   

    </script>
    </body>
</html>