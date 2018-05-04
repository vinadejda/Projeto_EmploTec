<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <link rel="icon" href="{{ asset('../images/logoVetor.png') }}" type="image/x-icon">
    <title>{{ __('EmployTec - Area do Admin') }}</title>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('../vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('../vendor/font-awesome/css/font-awesome.min.css') }}') }}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{ asset('../css/sb-admin.css') }}" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">{{ __('Login ADM - EmployTec') }}</div>
      <div class="card-body">
        <form  method="POST" action="{{ route('admin.login') }}">
             @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">{{ __('E-Mail') }}</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="example@example.com">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{ __('Senha') }}</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Senha">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
               
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Lembrar minha senha') }}
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>

        </form>

        <div class="text-center">
            <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('../vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('../vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('../vendor/jquery-easing/jquery.easing.min.js') }}"></script>
</body>

</html>
