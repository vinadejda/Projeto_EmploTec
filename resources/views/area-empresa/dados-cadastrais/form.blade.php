@extends('area-empresa.layout.template')

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

      @if(isset($usuario) && isset($empresa))

        <form role="form" method="post" action="/painel/empresa/alterar/">
          @csrf
          <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input type="hidden" input type="text" name="user" class="form-control" value="{{$empresa->fk_usuario}}">
           <fieldset>
              <legend>Dados de Login</legend>

              <div class="form-group col-md-6">
                <label for="nome">
                  <span class="text-danger">*</span> Nome
                </label>
                <input type="text" name="nome" class="form-control" maxlength="45" pattern="[[a-zA-Z0-9]\s\']+"  placeholder="Nome da Empresa" value="{{$usuario->name}}" required>
              </div>
              
              <div class="form-group col-md-6">
                <label for="email">
                  <span class="text-danger">*</span> Email
                </label>
                <input type="email" name="email"  class="form-control" maxlength="45" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email da Empresa"  value="{{$usuario->email}}" required>
              </div>
              <!--
              <div class="form-group col-md-6">
                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Digite a nova senha">
              </div>
              <div class="form-group col-md-6">
                <label for="confirma-senha">Confirmar Senha</label>
                <input type="password" name="confirma-senha" class="form-control" placeholder="Digite novamente a nova senha">
              </div>
            -->

              <div class="form-group col-md-12">
                <label for="foto">Foto</label>
                <input type="file" name="foto" maxlength="250" value="{{$usuario->im_perfil}}">
              </div>
            </fieldset>
            <br>
            <fieldset>
              <legend>Dados da Empresa</legend>

              <div class="form-group col-md-4">
                <label for="cnpj">
                  <span class="text-danger">*</span> CNPJ
                </label>
                <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ" value="{{$empresa->cd_cnpj}}" readonly required>
              </div>

              <div class="form-group col-md-8">
                <label for="rz_social">
                  <span class="text-danger">*</span> Razão Social
                </label>
                <input type="text" name="rz_social"  class="form-control" maxlength="45" pattern="[[a-zA-Z0-9]\s\']+" placeholder="Digite a Razão Social"  value="{{$empresa->ds_razao_social}}" required>
              </div>

              <div class="form-group col-md-6">
                <label for="rua">
                  <span class="text-danger">*</span> Rua
                </label>
                <input type="text" name="rua"   class="form-control" placeholder="Digite o endereço" pattern="[a-zA-Z0-9\s]+" maxlength="45"  value="{{$usuario->ds_rua}}" required>
              </div>

              <div class="form-group col-md-3">
                <label for="nr">
                  <span class="text-danger">*</span> nº
                </label>
                <input type="text" name="nr" class="form-control"  pattern="[0-9]+$" maxlength="5" placeholder="Digite o número do endereço" value="{{$usuario->nr_endereco}}" required>
              </div>

              <div class="form-group col-md-3">
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento"  class="form-control" placeholder="Digite o complemento" value="{{$usuario->ds_complemento}}" pattern="[a-zA-Z0-9\s]+" maxlength="50">
              </div>

              <div class="form-group col-md-3">
                <label for="bairro">
                  <span class="text-danger">*</span> Bairro
                </label>
                <input type="text" name="bairro"  class="form-control" pattern="[a-zA-Z0-9\s]+" maxlength="45" placeholder="Digite o bairro"  value="{{$usuario->ds_bairro}}" required>
              </div>
        
              <div class="form-group col-md-3">
                <label for="cidade">Cidade</label>
                <select id="cidade" name="cidade" class="form-control" >
                  <option {{(isset($usuario) ? '' : 'selected="selected"')}}></option>
                  @if(isset($cidades))
                    @foreach($cidades as $c)
                      <option value="{{$c->cd_cidade}}" {{(isset($usuario) && $c->cd_cidade == $usuario->fk_cidade) ? 'selected="selected"' : ''}}>{{$c->nm_cidade}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="tel">Telefone</label>
                <input type="tel" id="telefone" name="tel"  class="form-control" placeholder="Digite o telefone" value="{{$usuario->nr_tel}}">
              </div>

              <div class="form-group col-md-3">
                <label for="celular">Celular</label>
                <input type="tel" id="celular" name="celular"   class="form-control" placeholder="Digite o celular" value="{{$usuario->nr_cel}}">
              </div>
            </fieldset>
            <br>
            <fieldset>
              <legend>Redes Sociais</legend>

              <div class="form-group col-md-3">
                <label for="linkedin">Linkedin</label>
                <input type="url" name="linkedin" maxlength="45" class="form-control" placeholder="Digite o Linkedin" value="{{$usuario->link_linkedin}}" pattern="https?://.+" title="Exemplo: http://www.google.com">
              </div>

              <div class="form-group col-md-3">
                <label for="facebook">Facebook</label>
                <input type="url" name="facebook" maxlength="45" class="form-control" placeholder="Digite o Facebook" value="{{$usuario->link_facebook}}" pattern="https?://.+" title="Exemplo: http://www.google.com">
              </div>

              <div class="form-group col-md-3">
                <label for="twitter">Twitter</label>
                <input type="url" name="twitter" maxlength="45" class="form-control" placeholder="Digite o Twitter" value="{{$usuario->link_twitter}}" pattern="https?://.+" title="Exemplo: http://www.google.com">
              </div>

              <div class="form-group col-md-3">
                <label for="site">Site</label>
                <input type="url" name="site" maxlength="45" class="form-control" placeholder="Digite o Site" 
                value="{{$usuario->link_site}}" pattern="https?://.+" title="Exemplo: http://www.google.com">
              </div>
            </fieldset>
            <br>
            <div class="form-group col-md-8">
              <button type="submit" class="btn btn-success" >Salvar Dados</button>
              <button type="reset" class="btn btn-primary">Desfazer Mudanças</button>
              <!--<input type="button" class="btn btn-danger" value="Voltar" onClick="history.go(-1)"> -->
            </div>
          </form> 
        @endif
      </div> 
  
  </div>

@endsection