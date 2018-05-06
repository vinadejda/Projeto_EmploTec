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
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <div class="form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Nome
              </label>
              <input type="text" name="nome" pattern="[A-Za-z\s]+$" title="Nome digitado em formato invalido." maxlength="45" class="form-control" placeholder="Nome" required="required">
            </div>

            <div class=" form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Email
              </label>

                <div>
                  <input id="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Email digitado de maneira encorreta." maxlength="45" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="example@exaple.com" required>
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
                                <input id="password" type="password" maxlength="60" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required>

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
              <input type="text" name="rua" pattern="[A-Za-z0-9\s]+$" title="Endereço digitado de forma encorreta" maxlength="45" class="form-control" placeholder="Rua" required="required">
            </div>

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> N°
              </label>
              <input type="number" name="numero" pattern="[0-9]+$" title="Número da residecia digitado de forma encorreta" maxlength="5" class="form-control" required="required">
            </div>

            <div class="form-group col-md-4">
              <label for="quantidade">
                <span class="text-danger">* </span> Bairro
              </label>
              <input name="bairro" type="text" pattern="[A-Za-z\s]+$" title="Bairro digitado em formato invalido." maxlength="45" class="form-control" placeholder="Bairro" required="required">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Complemento
              </label>
              <input type="text" name="complemento" pattern="[A-Za-z\s]+$" title="Complemento digitado de forma encorreta" maxlength="50" class="form-control" placeholder="Complemento" >
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Telefone
              </label>
              <input type="number" name="telefone" maxlength="11" pattern="\([0-9]{2}\) [0-9]{4,4}-[0-9]{3,4}$" class="form-control" placeholder="Telefone" >
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Celular
              </label>
              <input type="number" name="celular" maxlength="11" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" class="form-control" placeholder="Celular">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Imagem
              </label>
              <input type="file" name="img"  maxlength="250" class="form-control" placeholder="Complemento" >
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Linkedin
              </label>
              <input type="text" name="linkedin" maxlength="45" class="form-control" placeholder="Linkedin">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Facebook
              </label>
              <input type="text" name="facebook" maxlength="45" class="form-control" placeholder="Facebook">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Twitter
              </label>
              <input type="text" name="twitter" maxlength="45" class="form-control" placeholder="Twitter">
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