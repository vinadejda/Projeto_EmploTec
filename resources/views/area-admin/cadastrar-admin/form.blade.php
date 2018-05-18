@extends('area-admin.layout.template')

@section('content')

  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="container-fluid caixa-vagas ">
  

      <div class="card-body">
        <form role="form" method="post" action="{{ '/painel/admin/perfil/salva'}}">
          <fieldset>
            <h2>Cadastrar Admin</h2>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <div class="form-group col-md-6 ">
              <label for="nome">
                <span class="text-danger">*</span> Nome
              </label>
              <input type="text" name="nome" maxlength="45" class="form-control" placeholder="Nome" required="required">
            </div>

            <div class=" form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Email
              </label>

                <div>
                  <input id="email" type="email" maxlength="45" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="example@exaple.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" title="Digite seu E-mail" placeholder="exemplo@hotmail.com">
                    @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>
            </div>


            <div class=" form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Senha
              </label>
              <div>
                <input id="password" type="password" min="6" maxlength="60" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  name="password" required title="Digite a sua Senha">
                @if ($errors->has('password'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
                        </div>


            <div class="form-group col-md-6">
              <label for="localidade">
                <span class="text-danger">* </span> Rua
              </label>
              <input id="endereco" type="text"  class="form-control{{ $errors->has('rua') ? ' is-invalid' : '' }}" name="rua" required value="{{ old('rua') }}" pattern="[a-zA-ZÀ-úçÇ0-9\s]+" maxlength="45" placeholder="Digite o seu Endereço"  oninvalid="setCustomValidity('Somente Letras e Números!')" onchange="try{setCustomValidity('')}catch(e){}">
                                @if ($errors->has('rua'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('rua') }}</strong>
                                </span>
                             @endif
            </div>

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> N°
              </label>
              <input id="numero" type="number" name="nr"  class="form-control{{ $errors->has('nr') ? ' is-invalid' : '' }}" required value="{{ old('nr') }}" pattern="[0-9]+$" placeholder="Número" maxlength="5" oninvalid="setCustomValidity('Somente Números!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Números">
                                @if ($errors->has('nr'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nr') }}</strong>
                                    </span>
                                @endif
            </div>

            <div class="form-group col-md-4">
              <label for="quantidade">
                <span class="text-danger">* </span> Bairro
              </label>
              <input id="bairro" type="text" class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}" name="bairro" required value="{{ old('bairro') }}" pattern="[a-zA-Z0-9\s]+" maxlength="45" placeholder="Digite o seu Bairro"  oninvalid="setCustomValidity('Somente Letras e Números!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Letras e Números!">
                            @if ($errors->has('bairro'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('bairro') }}</strong>
                                </span>
                            @endif
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Complemento
              </label>
              <input id="complemento"  type="text"  class="form-control{{ $errors->has('complemento') ? ' is-invalid' : '' }}" name="complemento" value="{{ old('complemento') }}" pattern="[a-zA-Z0-9\s]+" maxlength="50" placeholder="Digite o seu Complemento"  oninvalid="setCustomValidity('Somente Letras e Números!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Letras e Números!">
                            @if ($errors->has('complemento'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('complemento') }}</strong>
                                </span>
                            @endif
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Telefone
              </label>
              <input id="telefone" type="tel"  class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" maxlength="12" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" placeholder="(12) 3456-7890" title="(12) 3456-7890">
                        @if ($errors->has('tel'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                            @endif
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Celular
              </label>
              <input id="celular"   type="tel" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" maxlength="12" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$" placeholder="(12) 34567-8901" title="(12) 93456-7890">
                            @if ($errors->has('celular'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('celular') }}</strong>
                                </span>
                            @endif
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Imagem
              </label>
              <input id="imagem" class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}" type="file"  name="img" title="Formatos permitidos: .JPEG .JPG .PNG">
                        @if ($errors->has('img'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('img') }}</strong>
                            </span>
                        @endif
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Linkedin
              </label>
              <input id="linkedin" " type="url" class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" name="linkedin" value="{{ old('linkedin') }}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
                        @if ($errors->has('linkedin'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('linkedin') }}</strong>
                                </span>
                            @endif
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Facebook
              </label>
              <input id="facebook"  type="url" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" value="{{ old('facebook') }}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
                            @if ($errors->has('facebook'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                            @endif
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Twitter
              </label>
              <input id="twitter"  type="url" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" value="{{ old('twitter') }}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
                            @if ($errors->has('twitter'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                </span>
                            @endif
            </div>

            
          </fieldset>
          <div class="form-group col-md-6">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="reset" class="btn btn-primary">Limpar</button>
          </div>
        </form>    
      </div> 
  
  </div>

@endsection