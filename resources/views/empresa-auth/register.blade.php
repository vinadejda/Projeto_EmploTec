@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro da Empresa') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('empresa.register') }}">
                        @csrf
                        <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('Nome da Empresa') }}
                            </label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('E-mail') }}
                            </label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('Senha') }}
                            </label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('Confirmar Senha') }}
                            </label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('Endereço') }}
                            </label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" name="rua" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('Número') }}
                            </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" name="nr" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Complemento') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" name="complemento" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('Bairro') }}
                            </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" name="bairro" required>
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                            <div class="col-md-6">
                                <select name="estado" class="form-control">
                                    <option selected="selected"></option>
                                    @foreach ($estado as $e)
                                        <option value="{{ $e->cd_estado }}">{{ $e->nm_estado }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                            <div class="col-md-6">
                                <select name="cidade" class="form-control">
                                    <option selected></option>
                                    @foreach ($cidade as $c)
                                        <option value="{{ $c->cd_cidade }}">{{ $c->nm_cidade }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="tel" class="form-control" name="tel" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="tel" class="form-control" name="celular" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="file" name="img" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Linkedin') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="url" class="form-control" name="linkedin" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Facebook') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="url" class="form-control" name="facebook" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Twitter') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="url" class="form-control" name="twitter" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Site') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="url" class="form-control" name="portifolio" >
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
