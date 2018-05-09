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
    <h2>Curriculo</h2>  

      <div class="card-body">
        <form role="form" method="post" action="{{isset($curriculo) ? '/painel/candidato/curriculo/altera': '/painel/candidato/curriculo/salva'}}">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <div class="form-group col-md-6">
              <label for="objetivo">
                <span class="text-danger">*</span> Objetivo Profissional
              </label>
              <input type="text" name="objetivo" class="form-control" maxlength="50" placeholder="Digite o seu objetivo em poucas palavras" required value="{{isset($curriculo) ? $curriculo->ds_objetivo_profissional : old('objetivo')}}">
            </div>

            <div class="form-group col-md-6">
              <label for="vl_salario">
                Pretensão Salarial
              </label>
              <input type="number" name="vl_salario" maxlength="10" class="form-control" placeholder="Digite sua pretensão salarial" value="{{isset($curriculo) ? $curriculo->vl_prentencao_salarial : old('vl_salario')}}">
            </div>
            
            <div class="form-group col-md-6">
              <label for="resumo" >
                 Resumo Profissional
              </label>
              <textarea name="resumo" class="form-control"  placeholder="Digite seu resumo profissional">{{isset($curriculo) ? $curriculo->ds_resumo_profissional : old('resumo')}}</textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="informacoes">
                 Informações Complementares
              </label>
              <input name="informacoes" type="text"  class="form-control" placeholder="Digite as informações complementares" value="{{isset($curriculo) ? $curriculo->ds_info_complementar : old('informacoes')}}">
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