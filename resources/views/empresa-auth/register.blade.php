@extends('layouts.app')

@section('content')

<section style="margin-top: -8%;">
    <h1 style="color: #000; font-size: 2.8em; font-weight: 300;">{{ __('Cadastro da Empresa') }}</h1>
     <p>Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
   

    <form method="POST" action="{{ route('empresa.register') }}">
        @csrf
                     
        <fieldset>
            <legend>{{ __('Dados Empresariais') }}</legend>
                <div div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" >
                            <span class="text-danger" >*</span>{{ __('Nome Fantasia') }}
                        </label>
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" maxlength="45" pattern="[a-zA-ZÀ-ú\s\']+" placeholder="Digite o seu nome da sua empresa" oninvalid="setCustomValidity('Somente Letras!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Letras!">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </div>
                
                    <div class="form-group col-md-6">
                        <label for="email">
                            <span class="text-danger">*</span>{{ __('E-mail') }}
                        </label>
                        <input id="email"  type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="{{ old('email') }}" required maxlength="45" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="exemplo@exemplo.com" title="exemplo@exemplo.com">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>       

                <div div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">
                            <span class="text-danger">*</span>{{ __('Senha') }}
                        </label>
                        <input id="password" type="password" min="6" maxlength="60" placeholder="Digite a sua senha" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required title="Digite a sua Senha">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password-confirm">
                            <span class="text-danger">*</span>{{ __('Confirmar Senha') }}
                        </label>
                        <input id="password-confirm" type="password" min="6" maxlength="60" placeholder="Confirme sua senha" class="form-control" name="password_confirmation" required title="Confirme a sua Senha">
                    </div>
                </div>

                <div class="form-group">
                    <label for="imagem">{{ __('Imagem de Perfil') }}</label>
                    <input id="imagem" class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}" type="file"  name="img" title="Formatos permitidos: .JPEG .JPG .PNG">
                        @if ($errors->has('img'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('img') }}</strong>
                            </span>
                        @endif
                </div>

                <div div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="endereco">
                            <span class="text-danger">*</span>{{ __('Endereço') }}
                        </label>
                        <input id="endereco" type="text"  class="form-control{{ $errors->has('rua') ? ' is-invalid' : '' }}" name="rua" required value="{{ old('rua') }}" pattern="[a-zA-ZÀ-úçÇ0-9\s]+" maxlength="45" placeholder="Digite o seu Endereço"  oninvalid="setCustomValidity('Somente Letras e Números!')" onchange="try{setCustomValidity('')}catch(e){}">
                            @if ($errors->has('rua'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('rua') }}</strong>
                                </span>
                            @endif
                    </div>
        
                    <div class="form-group col-md-2">
                        <label for="numero">
                            <span class="text-danger">*</span>{{ __('Nº') }}
                        </label>
                        <input id="numero" type="number" name="nr"  class="form-control{{ $errors->has('nr') ? ' is-invalid' : '' }}" required value="{{ old('nr') }}" pattern="[0-9]+$" placeholder="Número" maxlength="5" oninvalid="setCustomValidity('Somente Números!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Números">
                            @if ($errors->has('nr'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('nr') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="complemento">{{ __('Complemento') }}</label>
                        <input id="complemento"  type="text"  class="form-control{{ $errors->has('complemento') ? ' is-invalid' : '' }}" name="complemento" value="{{ old('complemento') }}" pattern="[a-zA-Z0-9\s]+" maxlength="50" placeholder="Digite o seu Complemento"  oninvalid="setCustomValidity('Somente Letras e Números!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Letras e Números!">
                            @if ($errors->has('complemento'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('complemento') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group col-md-5">
                        <label for="bairro">
                            <span class="text-danger">*</span>{{ __('Bairro') }}
                         </label>                          
                        <input id="bairro" type="text" class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}" name="bairro" required value="{{ old('bairro') }}" pattern="[a-zA-Z0-9\s]+" maxlength="45" placeholder="Digite o seu Bairro"  oninvalid="setCustomValidity('Somente Letras e Números!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Letras e Números!">
                            @if ($errors->has('bairro'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('bairro') }}</strong>
                                </span>
                            @endif
                    </div>
                </div> 
                <div div class="form-row">       
                    <div class="form-group col-md-3">
                        <label for="estado">{{ __('Estado') }}</label>
                        <select name="estado" class="form-control">
                            <option>Selecione..</option>
                            @foreach ($estado as $e)
                                <option value="{{ $e->cd_estado }}">{{ $e->nm_estado }}</option>
                            @endforeach
                        </select>
                    </div>
                            
                    <div class="form-group col-md-3">
                        <label for="cidade">{{ __('Cidade') }}</label>
                        <select name="cidade" class="form-control">
                            <option selected="selected" value="">Selecione..</option>
                            @foreach ($cidade as $c)
                                <option value="{{ $c->cd_cidade }}">{{ $c->nm_cidade }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="telefone">{{ __('Telefone') }}</label>
                        <input id="telefone" type="tel"  class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" maxlength="12" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" placeholder="(12) 3456-7890" title="(12) 3456-7890">
                            @if ($errors->has('tel'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group col-md-3">
                        <label for="celular">{{ __('Celular') }}</label>            
                        <input id="celular"   type="tel" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" maxlength="12" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" placeholder="(12) 34567-8901" title="(12) 93456-7890">
                            @if ($errors->has('celular'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('celular') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <legend>{{ __('Redes Sociais') }}</legend>
                <div div class="form-row">        
                    <div class="form-group col-md-6">
                        <label for="linkedin">{{ __('Linkedin') }}</label>
                        <input id="linkedin" " type="url" class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" name="linkedin" value="{{ old('linkedin') }}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
                        @if ($errors->has('linkedin'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('linkedin') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="facebook">{{ __('Facebook') }}</label>
                        <input id="facebook"  type="url" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" value="{{ old('facebook') }}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
                            @if ($errors->has('facebook'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
                <div div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="twitter">{{ __('Twitter') }}</label>
                        <input id="twitter"  type="url" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" value="{{ old('twitter') }}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
                            @if ($errors->has('twitter'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="portifolio">{{ __('Portifolio') }}</label>
                        <input id="portifolio"  type="url" class="form-control{{ $errors->has('portifolio') ? ' is-invalid' : '' }}" name="portifolio" value="{{ old('portifolio') }}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
                            @if ($errors->has('portifolio'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('portilofio') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-success" style="margin-left: 35%;">{{ __('Cadastrar') }}</button>
            <button type="reset" class="btn btn-warning">{{ __('Limpar') }}</button>
            <a href="{{ url('/') }}" class="btn btn-danger">{{ __('Cancelar') }}</a>
            
                <!--div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="" class="btn btn-primary">
                        {{ __('Cadastrar') }}
                    </button>
                </div>
                </div-->
                      
        </form>

</section> 
    
@endsection
