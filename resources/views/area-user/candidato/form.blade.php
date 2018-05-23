@extends('area-user.layout.template')

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

      @if(isset($candidato) && isset($usuario))

        <form role="form" method="post" action="/painel/candidato/dados/altera">
          @csrf
          <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input type="hidden" input type="text" name="user" class="form-control" value="{{ auth()->guard('web')->user()->id }}">
           <fieldset>
              <legend>Dados de Login</legend>

              <div class="form-group col-md-6">
                <label for="nome">
                  <span class="text-danger">*</span> Nome
                </label>
                <input type="text" name="nome" class="form-control" maxlength="45" pattern="[[a-zA-Z0-9]\s\']+"  placeholder="Digite seu nome" value="{{ $usuario->name }}" required>
              </div>
              
              <div class="form-group col-md-6">
                <label for="email">
                  <span class="text-danger">*</span> Email
                </label>
                <input type="email" name="email"  class="form-control" maxlength="45" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email da candidato"  value="{{$usuario->email}}" required>
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
                <input type="file" name="foto" maxlength="250" value="{{$candidato->im_perfil}}">
              </div>
            </fieldset>
            <br>
            <fieldset>
              <legend>Dados da candidato</legend>

              <div class="form-group col-md-3">
                <label for="cd_cpf">
                  <span class="text-danger">*</span> CPF
                </label>
                <input type="text" name="cd_cpf" id="cd_cpf" class="form-control" placeholder="CPF" value="{{$candidato->cd_cpf}}" readonly required>
              </div>
              <div class="form-group col-md-3">
                <label for="estado_civil">
                    <span class="text-danger">* </span> Estado Civil
                 </label>
                <select name="estado_civil" required class="form-control">
                  <option {{(isset($candidato) ? '' : 'selected')}}></option>

                  <option value="Solteiro"
                  {{(isset($candidato) && 'Solteiro' == $candidato->ds_estado_civil) ? 'selected' : ''}}>Solteiro</option>
                  <option value="Casado"
                  {{(isset($candidato) && 'Casado' == $candidato->ds_estado_civil) ? 'selected' : ''}}>Casado</option>
                  <option value="Divorciado"
                  {{(isset($candidato) && 'Divorciado' == $candidato->ds_estado_civil) ? 'selected' : ''}}>Divorciado</option>
                  <option value="Viúvo"
                  {{(isset($candidato) && 'Viúvo' == $candidato->ds_estado_civil) ? 'selected' : ''}}>Viúvo</option>
                </select>

            </div>
              <div class="form-group col-md-3">
              <label for="dt_nascimento">
                <span class="text-danger">* </span> Data de nascimento
              </label>
              <input type="date" name="dt_nascimento" id="dataNascimento" maxlength="12" pattern="((0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" title="14/11/1997" class="form-control{{ $errors->has('dt_nascimento') ? ' is-invalid' : '' }}" required="required" value="{{isset($candidato) ? $candidato->dt_nascimento : old('dt_nascimento')}}" value="{{ old('dt_nascimento') }}" >
                @if ($errors->has('dt_nascimento'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('dt_nascimento') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-3">
              <label for="nacionalidade" >
                Nacionalidade
              </label>
              <input type="text" name="nacionalidade" pattern="[a-zA-ZÀ-ú\s\']+" maxlength="20" class="form-control{{ $errors->has('nacionalidade') ? ' is-invalid' : '' }}" placeholder="Digite sua nacionalidade" value="{{isset($candidato) ? $candidato->ds_nacionalidade : old('nacionalidade')}}" value="{{ old('nacionalidade') }}"  oninvalid="setCustomValidity('Somente Letras!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Letras!">
                @if ($errors->has('nacionalidade'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('nacionalidade') }}</strong>
                  </span>
                @endif
            </div>
          

          
              <div class="form-group col-md-6">
                <label for="endereco">
                  <span class="text-danger">*</span> Endereço
                </label>
                <input type="text" name="endereco"   class="form-control" placeholder="Digite o endereço" pattern="[a-zA-Z0-9\s]+" maxlength="45"  value="{{$usuario->ds_rua}}" required>
              </div>

              <div class="form-group col-md-3">
                <label for="nr">
                  <span class="text-danger">*</span> Nº
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
                  <option {{(isset($candidato) ? '' : 'selected="selected"')}}></option>
                  @if(isset($cidade))
                    @foreach($cidade as $c)
                      <option value="{{$c->cd_cidade}}" {{(isset($candidato) && $c->cd_cidade == $candidato->fk_cidade) ? 'selected="selected"' : ''}}>{{$c->nm_cidade}}</option>
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

              <div div class="form-row">
            <div class="form-group col-md-3">
              <label for="genero">
                <span class="text-danger">* </span> Gênero<br>
              </label>
              <div class="form-check">
                <input id="feminino" class="form-check-input" name="genero" type="radio"  required="required" value="Feminino" {{(isset($candidato) && 'Feminino' == $candidato->ic_genero) ? 'checked' : ''}}   >
                  <label for="feminino" class="form-check-label">
                    Feminino
                  </label> 
                <br>
                <input id="masculino" name="genero" type="radio"  class="form-check-input"  required="required" value="Masculino" {{(isset($candidato) && 'Masculino' == $candidato->ic_genero) ? 'checked' : ''}}> 
                  <label for="masculino" class="form-check-label">
                    Masculino
                  </label>
                <br>
                <input id="outros" name="genero" type="radio"  class="form-check-input"  required="required" value="Outros" {{(isset($candidato) && 'Outros' == $candidato->ic_genero) ? 'checked' : ''}}> 
                  <label for="outros" class="form-check-label">
                    Outro
                  </label>
              </div>
            </div>

            <div class="form-group col-md-3">
              <label for="deficiencia">
                Possui alguma deficiência?
              </label> 
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="op" type="radio"  class="form-control"  value="Sim"> 
                 <label class="form-check-label">Sim</label>
                <input class="form-check-input" name="op" type="radio"  class="form-control" value="Não"> 
                <label class="form-check-label">Não</label>
              </div>
            </div>
            <div class="form-group col-md-3">
              <div class="form-check">
                <select id="deficiencia" name="deficiencia" class="form-control">
                  <option {{(isset($candidato) ? '' : 'selected')}}></option>
                  @foreach($deficiencia as $d)
                    <option value="{{ (isset($d) && $d->cd_deficiencia == isset($candidato->fk_deficiencia)) ? '' : $d->cd_deficiencia }}"> {{$d->nm_deficiencia}} </option>  
                  @endforeach
                </select>
              </div>  
            </div>
          </div>

            </fieldset>
            <br>
            <fieldset>
              <legend>Redes Sociais</legend>

              <div class="form-group col-md-3">
                <label for="linkedin">Linkedin</label>
                <input type="url" name="linkedin" maxlength="45" class="form-control" placeholder="Digite o Linkedin" value="{{$candidato->link_linkedin}}" pattern="https?://.+" title="Exemplo: http://www.google.com">
              </div>

              <div class="form-group col-md-3">
                <label for="facebook">Facebook</label>
                <input type="url" name="facebook" maxlength="45" class="form-control" placeholder="Digite o Facebook" value="{{$candidato->link_facebook}}" pattern="https?://.+" title="Exemplo: http://www.google.com">
              </div>

              <div class="form-group col-md-3">
                <label for="twitter">Twitter</label>
                <input type="url" name="twitter" maxlength="45" class="form-control" placeholder="Digite o Twitter" value="{{$candidato->link_twitter}}" pattern="https?://.+" title="Exemplo: http://www.google.com">
              </div>

              <div class="form-group col-md-3">
                <label for="site">Site</label>
                <input type="url" name="site" maxlength="45" class="form-control" placeholder="Digite o Site" 
                value="{{$candidato->link_site}}" pattern="https?://.+" title="Exemplo: http://www.google.com">
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
  
  </section>

@endsection