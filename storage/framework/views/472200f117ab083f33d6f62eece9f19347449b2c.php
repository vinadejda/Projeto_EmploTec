<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset('../images/logoVetor.png')); ?>" type="image/x-icon">
    <title><?php echo e(__('EmployTec')); ?></title>

 <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('../css/bootstrap.min.css')); ?>">
    <!-- Google Fonts -->
    <!--link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"-->
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="<?php echo e(asset('../css/simple-line-icons.css')); ?>">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="<?php echo e(asset('../css/themify-icons.css')); ?>">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="<?php echo e(asset('../css/set1.css')); ?>">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('../css/style.css')); ?>">

    <!-- Bootstrap core CSS-->
  
  <!-- Custom fonts for this template-->
  <link href="<?php echo e(asset('../vendor/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?php echo e(asset('../vendor/datatables/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo e(asset('../css/sb-admin.css')); ?>" rel="stylesheet">
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
</head>
<body>
    <div class="nav-menu">
        <div class="bg transition">
            <div class="container-fluid fixed">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                                <img  width="25%;" src="<?php echo e(asset('../images/logo.png')); ?>">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="<?php echo e(url('vagas')); ?>"><?php echo e(__('VAGAS')); ?></a>
                                    </li>
                                    
                                    <li class="nav-item active">
                                        <a class="nav-link" href="<?php echo e(url('empresas')); ?>"><?php echo e(__('EMPRESA')); ?></a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="<?php echo e(url('sobrenos')); ?>"><?php echo e(__('SOBRE NÓS')); ?></a>
                                    </li>
                                    
                                    <!--li class="nav-item dropdown">
                                            <a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Login
                                                <span class="icon-arrow-down"></span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="<?php echo e(route('login')); ?>">Candidato</a>
                                                <a class="dropdown-item" href="<?php echo e(route('register')); ?>">Empresa</a>
                                              
                                            </div>
                                        </li-->
                                    <!-- Authentication Links -->
                                    <?php if(auth()->guard()->guest()): ?>
                                        <li class="nav-item">
                                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('LOGIN')); ?></a>
                                                </li>
                                                <li><a href="<?php echo e(route('register')); ?>" class="btn btn-outline-light top-btn">
                                                    <span class="ti-plus"></span><?php echo e(__('CADASTRE-SE')); ?> </a>
                                                </li>
                                    <?php else: ?>
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    <?php echo e(__('Logout')); ?>

                                                </a>

                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                 </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
