<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <link rel="icon" href="<?php echo e(asset('../images/logoVetor.png')); ?>" type="image/x-icon">
    <title><?php echo e(__('EmployTec - Area do Admin')); ?></title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo e(asset('../vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo e(asset('../vendor/font-awesome/css/font-awesome.min.css')); ?>') }}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo e(asset('../css/sb-admin.css')); ?>" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><?php echo e(__('Login ADM - EmployTec')); ?></div>
      <div class="card-body">
        <form  method="POST" action="<?php echo e(route('admin.login')); ?>">
             <?php echo csrf_field(); ?>
          <div class="form-group">
            <label for="exampleInputEmail1"><?php echo e(__('E-Mail')); ?></label>
            <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="example@example.com">

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"><?php echo e(__('Senha')); ?></label>
            <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="Senha">

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
               
                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Lembrar minha senha')); ?>

            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">
                                    <?php echo e(__('Login')); ?>

                                </button>

        </form>

        <div class="text-center">
            <a class="btn btn-link" href="<?php echo e(route('admin.password.request')); ?>">
                <?php echo e(__('Forgot Your Password?')); ?>

            </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo e(asset('../vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('../vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo e(asset('../vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
</body>

</html>
