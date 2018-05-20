@extends('layouts.app')

@section('content')
<section style="margin-top: -7% !important; margin-bottom: -8% !important; margin: 0 auto; width: 600px;">
    <h1 style="color: #000; font-size: 2.8em; font-weight: 300;">{{ __('Login da Empresa') }}</h1>
        <form method="POST" action="{{ route('empresa.login') }}">
        @csrf
            <fieldset>
                <div div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="email">
                            {{ __('E-mail') }}
                        </label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                           @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="password">{{ __('Senha') }}</label>
                        <input id="password" type="password" maxlength="60" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                 <div div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="col-md-6 offset-md-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Lembre-se de mim') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                        
                <div class="form-group row mb-0" style="justify-content: center;">
                    <div class="col-md-8 offset-md-4">
                       <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>                            
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>            
                    </div>
                </div>
            </fieldset>
        </form>       
    </section>

@endsection
