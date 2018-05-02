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
  <div class="container-fluid caixa-experiencia ">
    <h2>Informações do Candidato</h2>  

      <div class="card-body">
        <form role="form" method="post" action="{{isset($candidato) ? '/painel/candidato/dados/altera': '/painel/candidato/dados/adiciona'}}">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" input type="text" name="cpf" class="form-control" value="{{isset($candidato) ? $candidato->cd_cpf : '' }}">
            <input type="hidden" input type="text" name="id" class="form-control" value="{{isset($candidato) ? $candidato->cd_experiencia : '' }}">
            @if(!isset($candidato))
            <div class="form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> CPF
              </label>
              <input type="text" name="cpf" class="form-control" placeholder="Nome do Cargo Exercido" required="required" value="{{isset($candidato) ? $candidato->cd_cpf : old('cpf')}}">
            </div>
            @endif
            <div class="form-group col-md-4">
                <label for="localidade">
                    <span class="text-danger">* </span> Estado Civil
                 </label>
                <select name="estado_civil" required="required" class="form-control">
                    <option value="{{isset($candidato) ? $candidato->ds_estado_civil : old('estado_civil')}}"> {{isset($candidato) ? $candidato->ds_estado_civil : old('estado_civil') }}</option>
                     <option value="Solteiro">Solteiro</option>
                     <option value="Casado">Casado</option>
                     <option value="Divorciado">Divorciado</option>
                     <option value="Viúvo">Viúvo</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> Data de nascimento
              </label>
              <input type="date" name="dt_nascimento" class="form-control" required="required" value="{{isset($candidato) ? $candidato->dt_nascimento : old('dt_nascimento')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
                <span class="text-danger">* </span> Nacionalidade
              </label>
              <input type="text" name="nacionalidade" class="form-control" placeholder="Sua nacionalidade" required="required"  value="{{isset($candidato) ? $candidato->ds_nacionalidade : old('nacionalidade')}}">
            </div>

            <div class="form-group col-md-6">
              <label for="quantidade">
                <span class="text-danger">* </span> Genero<br>
              </label>
              <div class="form-check form-check-inline">
              <input class="form-check-input" name="genero" type="radio"  required="required" value="Feminino" >
                <label class="form-check-label">
                  Feminino
                </label> 
              
                <input name="genero" type="radio"  class="form-check-input"  required="required" value="Masculino"> 
                <label class="form-check-label">
                  Masculino
                </label>
      
                <input name="genero" type="radio"  class="form-check-input"  required="required" value="Outros"> 
                 <label class="form-check-label">
                  Outro
                </label>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span>Possui alguma deficiencia?
              </label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="op" type="radio"  class="form-control"  required="required" value="Sim"> 
                 <label class="form-check-label">
                  Sim
                 </label>
                <input class="form-check-input" name="op" type="radio"  class="form-control"  required="required" value="Não"> 
                <label class="form-check-label">
                  Não
                </label>
              </div>
              <div class="form-check">
                @foreach($deficiencia as $d)
                   <input name="deficiencia" type="radio"  class="form-check-input" value="{{isset($d) ? $d->cd_deficiencia : old('deficiencia')}}">
                   <label class="form-check-label" for="exampleRadios2">
                    {{$d->nm_deficiencia}}
                  </label><br>
                @endforeach
              </div>  
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