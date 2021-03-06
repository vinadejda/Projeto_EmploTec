@extends('area-empresa.layout.template')

@section('content')
<!--
  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
-->
  <section class="container-fluid caixa-vagas ">    
    <form role="form" method="post" action="{{isset($vaga) ? '/painel/empresa/vagas/altera': '/painel/empresa/vagas/adiciona'}}">
      <fieldset>
        <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input type="hidden" input type="text" name="id" class="form-control" value="{{isset($vaga) ? $vaga->cd_vaga : '' }}">
          <div div class="form-row">
            <div class="form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Tema da vaga
              </label>
              <input type="text" name="nome" maxlength="30" pattern="[a-zA-Z\s\']+" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="Tema da vaga" required="required" value="{{isset($vaga) ? $vaga->nm_vaga : old('nome')}}">
                @if ($errors->has('nome'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('nome') }}</strong>
                  </span>
                @endif
            </div>
            <div class="form-group col-md-6">
              <label for="areaTI">
                <span class="text-danger">* </span> Área de TI
              </label>
              <select id="areaTI" name="areaTI" class="form-control{{ $errors->has('areaTI') ? ' is-invalid' : '' }}" required="required">
                <option {{(isset($vaga) ? '' : 'selected="selected"')}}></option>
                @foreach($areasTI as $a)
                  <option value="{{$a->cd_areaTI}}" {{(isset($vaga) && $a->cd_areaTI == $vaga->fk_area_ti) ? 'selected="selected"' : ''}}>{{$a->nm_areaTI}}</option>
                @endforeach
              </select>
                @if ($errors->has('areaTI'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('areaTI') }}</strong>
                  </span>
                @endif
            </div>
          </div>
         
          <div div class="form-row">
            <div class="form-group col-md-3">
              <label for="quantidade">
                <span class="text-danger">* </span> Quantidade de Vagas
              </label>
              <input name="quantidade" type="text" maxlength="3"  min="0" max="100" class="form-control{{ $errors->has('quantidade') ? ' is-invalid' : '' }}" placeholder="Quantidade de vagas" required="required" value="{{isset($vaga) ? $vaga->qt_vagas : old('quantidade')}}">
                @if ($errors->has('quantidade'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('quantidade') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-3">
              <label for="salario" >
                <span class="text-danger">* </span> Salário
              </label>
              <input type="text" id="salario" name="salario" class="form-control{{ $errors->has('salario') ? ' is-invalid' : '' }}" placeholder="Salario de vagas" required="required"  value="{{isset($vaga) ? $vaga->vl_salario_vaga : old('salario')}}">
                @if ($errors->has('salario'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('salario') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group col-md-3">
              <label for="nivel"><span class="text-danger">* </span> Nível</label>
              <select id="nivel" name="nivel"  class="form-control{{ $errors->has('nivel') ? ' is-invalid' : '' }}">
                <option {{(isset($vaga) ? '' : 'selected="selected"')}}></option>
                <option value="Estágio" {{(isset($vaga) && 'Estágio' == $vaga->ds_nivel) ? 'selected="selected"' : ''}}>Estágio</option>
                <option value="Trainne" {{(isset($vaga) && 'Trainne' == $vaga->ds_nivel) ? 'selected="selected"' : ''}}>Trainne</option>
              </select>
                @if ($errors->has('nivel'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('nivel') }}</strong>
                  </span>
                @endif
            </div>
          </div>
          <div class="form-group col-md-3">
            <label for="contratacao">Tipo de Contratação</label>
            <select id="contratacao" name="contratacao" class="form-control{{ $errors->has('contratacao') ? ' is-invalid' : '' }}">
              <option {{(isset($vaga) ? '' : 'selected="selected"')}}></option>
              <option value="clt" {{(isset($vaga) && 'CLT' == $vaga->nm_contratacao) ? 'selected="selected"' : ''}} >CLT</option>
              <option value="pj" {{(isset($vaga) && 'PJ' == $vaga->nm_contratacao) ? 'selected="selected"' : ''}} >PJ</option>
            </select>
              @if ($errors->has('contratacao'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('contratacao') }}</strong>
                </span>
              @endif
          </div>
          <div class="form-group col-md-6">
            <label for="cidade">
              <span class="text-danger">* </span> Cidade
            </label>
            <select id="cidade" name="cidade" class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}" required="required">
              <option {{(isset($vaga) ? '' : 'selected="selected"')}}></option>
              @foreach($cidades as $c)
                <option value="{{$c->cd_cidade}}" {{(isset($vaga) && $c->cd_cidade == $vaga->fk_cidade) ? 'selected="selected"' : ''}}>{{$c->nm_cidade}}</option>
              @endforeach
            </select>
              @if ($errors->has('cidade'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('cidade') }}</strong>
                </span>
              @endif
          </div>

          <div class="form-group col-md-6">
            <label for="dataExpiracao">
              <span class="text-danger">* </span> Data de Expiração
            </label>
            <input type="date" name="dataExpiracao" class="form-control{{ $errors->has('dataExpiracao') ? ' is-invalid' : '' }}" required="required" min="" max="" value="{{isset($vaga) ? $vaga->dt_expiracao : old('dataExpiracao')}}">
              @if ($errors->has('dataExpiracao'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('dataExpiracao') }}</strong>
                </span>
              @endif
          </div>
          <div class="form-group col-md-12">
            <label>Benefícios</label>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="valeTransporte" name="beneficio[]" 
                  {{isset($vaga) && $vaga->ic_vale_transporte ? 'checked' : ''}}>Vale Transporte
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="valeAlimentacao" name="beneficio[]"
                  {{isset($vaga) && $vaga->ic_vale_alimentacao ? 'checked' : ''}}>Vale Alimentação
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="planoSaude" name="beneficio[]"
                {{isset($vaga) && $vaga->ic_plano_saude ? 'checked' : ''}}>Plano de Saúde
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="planoDentario" name="beneficio[]"
                  {{isset($vaga) && $vaga->ic_plano_dentario ? 'checked' : ''}}>Plano Dentário
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="planoVida" name="beneficio[]"
                {{isset($vaga) && $vaga->ic_seguro_vida ? 'checked' : ''}}>Plano de Vida
              </label>
            </div>
          </div>
        </fieldset>
        <div class="form-group col-md-8">
          <button type="submit" class="btn btn-success" >Salvar Dados</button>
            @if(!isset($vaga))
              <button type="reset" class="btn btn-primary">Limpar</button>
            @endif
        </div>
    </form>    
  </section>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.telefone').mask("(99) 99999-9999");
      $
    });
  </script>
@endsection
