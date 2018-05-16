@extends('layouts.app')

@section('content')

  <section style="margin-top: -8%;">
    <h1 style="color: #000; font-size: 2.8em; font-weight: 300;">{{ __('Mais Informações') }}</h1>
    <p>Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
      <form role="form" method="post" action="{{isset($candidato) ? '/painel/candidato/dados/altera': '/painel/candidato/dados/salva'}}">
        <fieldset>
           
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <input type="hidden" input type="text" name="cd_cpf" class="form-control" value="{{isset($candidato) ? $candidato->cd_cpf : '' }}">
          <input type="hidden" input type="text" name="id" class="form-control" value="{{isset($candidato) ? $candidato->cd_experiencia : '' }}">
            
          <div div class="form-row">
            <div class="form-group col-md-3">
              <label for="cpf">
                <span class="text-danger">*</span> CPF
              </label>
              <input type="text" name="cd_cpf" id="cpf"  maxlength="14" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="123.456.789-10" class="form-control{{ $errors->has('cd_cpf') ? ' is-invalid' : '' }}" placeholder="Digite seu CPF" required value="{{isset($candidato) ? $candidato->cd_cpf : old('cd_cpf')}}" 
              {{isset($candidato) ? 'readonly' : ''}} value="{{ old('cd_cpf') }}" >
                @if ($errors->has('cd_cpf'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('cd_cpf') }}</strong>
                  </span>
                @endif
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
                @if ($errors->has('estado_civil'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('estado_civil') }}</strong>
                  </span>
                @endif
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
              <input type="text" name="nacionalidade"  maxlength="20" class="form-control{{ $errors->has('nacionalidade') ? ' is-invalid' : '' }}" placeholder="Digite sua nacionalidade" value="{{isset($candidato) ? $candidato->ds_nacionalidade : old('nacionalidade')}}" value="{{ old('nacionalidade') }}" >
                @if ($errors->has('nacionalidade'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('nacionalidade') }}</strong>
                  </span>
                @endif
            </div>
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

                @if ($errors->has('deficiencia'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('deficiencia') }}</strong>
                  </span>
                @endif
                </select>
              </div>  
            </div>
          </div>

        </fieldset>
        <button type="submit" class="btn btn-success" style="margin-left: 35%;">{{ __('Cadastrar') }}</button>
        <button type="reset" class="btn btn-warning">{{ __('Limpar') }}</button>
        <a href="{{ url('/') }}" class="btn btn-danger">{{ __('Cancelar') }}</a>
      </form>    
  </section>
@endsection