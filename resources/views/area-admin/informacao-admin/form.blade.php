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
  <section class="container-fluid caixa-vagas ">
  
    <div class="card-body">
      <h2>Atualizar Informações</h2>
      <p>Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
        <form role="form" method="post" action="{{ '/painel/admin/perfil/altera'}}">
          <fieldset>
            <legend>Dados de Login</legend>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nome">
                  <span class="text-danger">*</span> Nome
                </label>
                <input type="text" name="nome"  pattern="[a-zA-ZÀ-ú\s\']+"  class="form-control" placeholder="Nome da vaga" required="required" value="{{isset($admin) ? $admin->name : old('nome')}}">
              </div>

              <div class="form-group col-md-6">
                <label for="email">
                  <span class="text-danger">* </span> Email
                </label>
                <input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="exemplo@exemplo.com" required="required" value="{{isset($admin) ? $admin->email : old('email')}}">
              </div>
            </div>
            <div class="form-group col-md-12">
              <label for="img" >
                Foto
              </label>
              <input type="file" name="img" maxlength="250" class="form-control" placeholder="Complemento"  value="{{isset($admin) ? $admin->im_perfil : old('img')}}">
            </div>
          </fieldset>
          <fieldset>
            <legend>Dados de Contato</legend>
            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="endereco">
                  <span class="text-danger">* </span> Endereço
                </label>
                <input type="text" name="endereco" class="form-control" pattern="[a-zA-ZÀ-úçÇ0-9\s]+"  placeholder="Digite o seu Endereço" required="required" value="{{isset($admin) ? $admin->ds_rua : old('endereco')}}">
                </div>

                <div class="form-group col-md-2">
                  <label for="numero">
                    <span class="text-danger">* </span> N°
                  </label>
                  <input type="number" name="numero"  class="form-control" required="required" maxlength="5" value="{{isset($admin) ? $admin->nr_endereco : old('numero')}}">
                </div>
              
              <div class="form-group col-md-5">
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento"  class="form-control"  pattern="[a-zA-Z0-9\s]+" maxlength="50" placeholder="Complemento" value="{{isset($admin) ? $admin->ds_complemento : old('complemento')}}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="bairro">
                  <span class="text-danger">* </span> Bairro
                </label>
                  <input name="bairro" type="text"  class="form-control" pattern="[a-zA-Z0-9\s]+" maxlength="45" placeholder="Bairro" required="required" value="{{isset($admin) ? $admin->ds_bairro : old('bairro')}}">
              </div>

              <div class="form-group col-md-2">
                <label for="estado">Estado</label>
                <select name="estado" class="form-control">
                  <option></option>
                  @foreach($estado as $e)
                  <option value="{{ $e->cd_estado }}">{{ $e->sg_estado }}</option>
                  @endforeach
                </select>
                <!--input type="text" name="complemento"  class="form-control"  pattern="[a-zA-Z0-9\s]+" maxlength="50" placeholder="Complemento"   value="{{isset($admin) ? $admin->ds_complemento : old('complemento')}}"-->
              </div>

              <div class="form-group col-md-5">
                <label for="cidade">Cidade</label>
                <select name="cidade" class="form-control">
                  <option></option>
                  @foreach($cidade as $c)
                  <option value="{{$c->cd_cidade}}">{{ $c->nm_cidade }}</option>
                  @endforeach
                </select>
                <!--input type="text" name="complemento"  class="form-control"  pattern="[a-zA-Z0-9\s]+" maxlength="50" placeholder="Complemento"   value="{{isset($admin) ? $admin->ds_complemento : old('complemento')}}"-->
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone"  class="form-control" placeholder="Telefone"   value="{{isset($admin) ? $admin->nr_tel : old('telefone')}}" maxlength="12" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$">
              </div>

              <div class="form-group col-md-6">
                <label for="celular">Celular</label>
                <input type="tel" id ="celular" name="celular" class="form-control" placeholder="Celular"   value="{{isset($admin) ? $admin->nr_cel : old('celular')}}"  maxlength="12" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$">
              </div>
            </div>
          </fieldset>
            
          <fieldset>
            <legend>Redes Sociais</legend>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="linkedin">Linkedin</label>
                <input type="text" name="linkedin" maxlength="45" class="form-control" placeholder="Linkedin"   value="{{isset($admin) ? $admin->link_linkedin : old('linkedin')}}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
              </div>

              <div class="form-group col-md-4">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" maxlength="45" class="form-control" placeholder="Facebook"   value="{{isset($admin) ? $admin->link_facebook : old('facebook')}}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
              </div>
              <div class="form-group col-md-4">
                <label for="twitter">Twitter</label>
                <input type="text" name="twitter" maxlength="45" class="form-control" placeholder="Twitter"   value="{{isset($admin) ? $admin->link_twitter : old('twitter')}}" maxlength="45" pattern="https?://.+" title="Exemplo: http://www.google.com">
              </div>
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