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
        <form role="form" method="post" action="{{isset($exp) ? '/painel/candidato/altera': '/painel/candidato/adiciona'}}">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" input type="text" name="id" class="form-control" value="{{isset($exp) ? $exp->cd_experiencia : '' }}">
            @if(isset($candidato))
            <div class="form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> CPF
              </label>
              <input type="text" name="cpf" class="form-control" placeholder="Nome do Cargo Exercido" required="required" value="{{isset($candidato) ? $candidato->cd_cpf : old('cpf')}}">
            </div>
            @endif
            <div class="form-group col-md-6">
                <label for="localidade">
                    <span class="text-danger">* </span> Estado Civil
                 </label>
                <select name="estado_civil" required="required" class="form-control">
                    <option value="{{isset($exp) ? $exp->ds_experiencia : old('estado_civil')}}">Selecione</option>
                     <option value="Solteiro">Solteiro</option>
                     <option value="Casado">Casado</option>
                     <option value="Divorciado">Divorciado</option>
                     <option value="Viúvo">Viúvo</option>
                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="quantidade">
                <span class="text-danger">* </span> Genero
              </label>
              <input name="genero" type="radio"  class="form-control"  required="required" value="Feminino"> Feminino
              <input name="genero" type="radio"  class="form-control"  required="required" value="Masculino"> Masculino
              <input name="genero" type="radio"  class="form-control"  required="required" value="Outro"> Outro
            </div>

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> Data de nascimento
              </label>
              <input type="date" name="dt_nascimento" class="form-control" required="required" value="{{isset($exp) ? $exp->dt_nascimento : old('dt_nascimento')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
                <span class="text-danger">* </span> Nacionalidade
              </label>
              <input type="text" name="nacionalidade" class="form-control" placeholder="Salario de vagas" required="required"  value="{{isset($exp) ? $exp->ds_nacionalidade : old('nacionalidade')}}">
            </div>

            

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> Possui alguma deficiencia?
              </label>
                <input name="op" type="radio"  class="form-control"  required="required" value="Sim"> Sim
                <input name="op" type="radio"  class="form-control"  required="required" value="Não"> Não

              
                @foreach($deficiencia as $d)
                   <input name="deficiencia" type="radio"  class="form-control" value="{{isset($d) ? $d->cd_deficiencia : old('deficiencia')}}">{{$d->nm_deficiencia}}
                @endforeach

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