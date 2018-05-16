@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 8%;margin-bottom: 8%;">
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
                                <input id="name" type="text" maxlength="45" pattern="[[a-zA-Z0-9]\s\']+" placeholder="Digite o nome da empresa"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" title="Digite o nome da empresa" required autofocus>

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
                                <input id="email" type="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required maxlength="45" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="exemplo@exemplo.com" title="exemplo@exemplo.com">

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
                                <input id="password" type="password" maxlength="60" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required title="Digite a sua Senha">

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
                                <input id="password-confirm" type="password" maxlength="60" class="form-control" name="password_confirmation" required title="Confirme a sua Senha">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('Endereço') }}
                            </label>
                            <div class="col-md-6">
                                <input id="endereco" type="text"  class="form-control{{ $errors->has('rua') ? ' is-invalid' : '' }}" name="rua" required value="{{ old('rua') }}" pattern="[a-zA-Z0-9\s]+" maxlength="45" placeholder="Digite o seu Endereço"  oninvalid="setCustomValidity('Somente Letras e Números!')" onchange="try{setCustomValidity('')}catch(e){}">
                                    @if ($errors->has('rua'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('rua') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('Número') }}
                            </label>

                            <div class="col-md-6">
                                <input id="numero" type="number" name="nr"  class="form-control{{ $errors->has('nr') ? ' is-invalid' : '' }}" required value="{{ old('nr') }}" pattern="[0-9]+$" placeholder="Número" maxlength="5" oninvalid="setCustomValidity('Somente Números!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Números">
                                @if ($errors->has('nr'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Complemento') }}</label>

                            <div class="col-md-6">
                                <input id="complemento"  type="text"  class="form-control{{ $errors->has('complemento') ? ' is-invalid' : '' }}" name="complemento" value="{{ old('complemento') }}" pattern="[a-zA-Z0-9\s]+" maxlength="50" placeholder="Digite o seu Complemento"  oninvalid="setCustomValidity('Somente Letras e Números!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Letras e Números!">
                            @if ($errors->has('complemento'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('complemento') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('Bairro') }}
                            </label>

                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}" name="bairro" required value="{{ old('bairro') }}" pattern="[a-zA-Z0-9\s]+" maxlength="45" placeholder="Digite o seu Bairro"  oninvalid="setCustomValidity('Somente Letras e Números!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Letras e Números!">
                                @if ($errors->has('bairro'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                @endif
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
                                <input id="telefone" type="tel"  class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" maxlength="12" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" placeholder="(12) 3456-7890" title="(12) 3456-7890">
                                @if ($errors->has('telefone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
                            <div class="col-md-6">
                                <input id="celular"   type="tel" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" maxlength="12" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" placeholder="(12) 34567-8901" title="(12) 93456-7890">
                                @if ($errors->has('celular'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                            <div class="col-md-6">
                                <input id="imagem" class="form-control{{ $errors->has('img0') ? ' is-invalid' : '' }}" type="file"  name="img" title="Formatos permitidos: .JPEG .JPG .PNG">
                                @if ($errors->has('img'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Linkedin') }}</label>
                            <div class="col-md-6">
                                <input id="linkedin" " type="url" class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" name="linkedin" value="{{ old('linkedin') }}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
                            @if ($errors->has('linkedin'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('linkedin') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Facebook') }}</label>
                            <div class="col-md-6">
                                <input id="facebook"  type="url" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" value="{{ old('facebook') }}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
                            @if ($errors->has('facebook'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Twitter') }}</label>
                            <div class="col-md-6">
                                <input id="twitter"  type="url" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" value="{{ old('twitter') }}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
                            @if ($errors->has('twitter'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Site') }}</label>

                            <div class="col-md-6">
                                <input id="site"  type="url" class="form-control{{ $errors->has('site') ? ' is-invalid' : '' }}" name="site" value="{{ old('site') }}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
                            @if ($errors->has('site'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('site') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-success" style="margin-left: 35%;">{{ __('Cadastrar') }}</button>
            <button type="reset" class="btn btn-warning">{{ __('Limpar') }}</button>
            <a href="{{ url('/') }}" class="btn btn-danger">{{ __('Cancelar') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
