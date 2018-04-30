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
    <h2>Experiencias Relevantes</h2>  

      <div class="card-body">
        <form role="form" method="post" action="{{isset($exp) ? '/empresa/vagas/altera': '/painel/candidato/experiencia/adiciona'}}">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" input type="text" name="id" class="form-control" value="{{isset($exp) ? $exp->cd_experiencia : '' }}">

            <div class="form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Cargo
              </label>
              <input type="text" name="cargo" class="form-control" placeholder="Nome do Cargo Exercido" required="required" value="{{isset($exp) ? $exp->nm_cargo_experiencia : old('cargo')}}">
            </div>

            <div class="form-group col-md-6">
              <label for="localidade">
                <span class="text-danger">* </span> Descrição
              </label>
              <input type="text" name="descricao" class="form-control" placeholder="Localidade da vaga" required="required" value="{{isset($exp) ? $exp->ds_experiencia : old('descricao')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="quantidade">
                <span class="text-danger">* </span> Nome Empresa
              </label>
              <input name="empresa" type="text" min="0" max="100" class="form-control" placeholder="Quantidade de vagas" required="required" value="{{isset($exp) ? $exp->nm_empresa : old('empresa')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
                <span class="text-danger">* </span> Segmento
              </label>
              <input type="text" name="segmento" class="form-control" placeholder="Salario de vagas" required="required"  value="{{isset($exp) ? $exp->ds_segmento_empresa : old('segmento')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
                <span class="text-danger">* </span> Salário
              </label>
              <input type="number" name="salario" class="form-control" placeholder="Salario de vagas" required="required"  value="{{isset($exp) ? $exp->vl_salario : old('salario')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> Data de Inicio
              </label>
              <input type="date" name="dataInicio" class="form-control" required="required" value="{{isset($exp) ? $exp->dt_inicio_experiencia : old('dataInicio')}}">
            </div>

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> Data de Termino
              </label>
              <input type="date" name="dataTermino" class="form-control" required="required" value="{{isset($exp) ? $exp->dt_termino_experiencia : old('dataTermino')}}">
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