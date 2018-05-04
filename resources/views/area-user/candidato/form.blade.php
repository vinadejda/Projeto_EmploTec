@extends('layouts.app')

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
        <form role="form" method="post" action="{{isset($candidato) ? '/painel/candidato/dados/altera': '/painel/candidato/dados/salva'}}">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" input type="text" name="cpf" class="form-control" value="{{isset($candidato) ? $candidato->cd_cpf : '' }}">
            <input type="hidden" input type="text" name="id" class="form-control" value="{{isset($candidato) ? $candidato->cd_experiencia : '' }}">
            
            <div class="form-group col-md-3">
              <label for="cpf">
                <span class="text-danger">*</span> CPF
              </label>
              <input type="text" name="cpf" class="form-control" placeholder="Digite seu CPF" required value="{{isset($candidato) ? $candidato->cd_cpf : old('cpf')}}" 
              {{isset($candidato) ? 'readonly' : ''}}>
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
              <input type="date" name="dt_nascimento" class="form-control" required="required" value="{{isset($candidato) ? $candidato->dt_nascimento : old('dt_nascimento')}}">
            </div>

            <div class="form-group col-md-3">
              <label for="nacionalidade" >
                Nacionalidade
              </label>
              <input type="text" name="nacionalidade" class="form-control" placeholder="Digite sua nacionalidade" value="{{isset($candidato) ? $candidato->ds_nacionalidade : old('nacionalidade')}}">
            </div>

            <div class="form-group col-md-3">
              <label for="genero">
                <span class="text-danger">* </span> Gênero<br>
              </label>
              <div class="form-check ">
              <input id="feminino" class="form-check-input" name="genero" type="radio"  required="required" value="Feminino" {{(isset($candidato) && 'Feminino' == $candidato->ic_genero) ? 'checked' : ''}}>
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