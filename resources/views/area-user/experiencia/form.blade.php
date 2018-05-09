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
    <h2>Experiências Relevantes</h2>  

      <div class="card-body">
        <form role="form" method="post" action="{{isset($exp) ? '/painel/candidato/experiencia/altera': '/painel/candidato/experiencia/salva'}}">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" input type="text" name="id" class="form-control" value="{{isset($exp) ? $exp->cd_experiencia : '' }}">

            <div class="form-group col-md-6">
              <label for="cargo">
                <span class="text-danger">*</span> Cargo
              </label>
              <input type="text" name="cargo" class="form-control" maxlength="30" placeholder="Digite o cargo exercido" required="required" value="{{isset($exp) ? $exp->nm_cargo_experiencia : old('cargo')}}">
            </div>

            <div class="form-group col-md-6">
              <label for="descricao">
                Descrição
              </label>
              <input type="text" name="descricao" maxlength="300" class="form-control" placeholder="Descreva sobre suas funções" value="{{isset($exp) ? $exp->ds_experiencia : old('descricao')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="empresa">
                <span class="text-danger">* </span> Nome Empresa
              </label>
              <input name="empresa" type="text" maxlength="20" class="form-control" placeholder="Digite o nome da empresa" required="required" value="{{isset($exp) ? $exp->nm_empresa : old('empresa')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="segmento" >
                Segmento
              </label>
              <input type="text" name="segmento" maxlength="25" class="form-control" placeholder="Digite o segmento da empresa"   value="{{isset($exp) ? $exp->ds_segmento_empresa : old('segmento')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
                Salário
              </label>
              <input type="number" name="salario" class="form-control" placeholder="Digite o salário"  value="{{isset($exp) ? $exp->vl_salario : old('salario')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="dataInicio">
                <span class="text-danger">* </span> Data de Início
              </label>
              <input type="date" name="dataInicio" maxlength="10"  class="form-control" required value="{{isset($exp) ? $exp->dt_inicio_experiencia : old('dataInicio')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="dataTermino">
              Data de Término
              </label>
              <input type="date" name="dataTermino" maxlength="10" class="form-control"  value="{{isset($exp) ? $exp->dt_termino_experiencia : old('dataTermino')}}">
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