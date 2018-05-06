@extends('area-admin.layout.template')

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
  <div class="container-fluid caixa-areaTIs ">
  

      <div class="card-body">
        <form role="form" method="post" action="{{ isset($pergunta) ? '/painel/admin/testes/altera':'/painel/admin/testes/adiciona'}}">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
             <input type="hidden" input type="text" name="cd_pergunta" class="form-control" value="{{isset($pergunta) ? $pergunta->cd_pergunta : '' }}">
            
            <h2> Questão</h2>
            <hr>
            
            <div class="form-group col-md-4">
              <label for="nome">
                <span class="text-danger">*</span> <b>Escolha uma Area</b>
              </label>
              <select name="areaTI" class="form-control" required>
                <option {{(isset($pergunta) ? '' : 'selected="selected"')}}></option>
                @foreach($areasTI as $aTI)
                  <option value="{{ $aTI->cd_areaTI }}" {{ (isset($pergunta) && $aTI->cd_areaTI == $pergunta->fk_areaTI) ? 'selected="selected"' : 'Selecione..'}}>{{ $aTI->nm_areaTI }}</option>
                @endforeach
              </select>
            </div>
              <div class="form-group">
              <label for="pergunta">
                <span class="text-danger">*</span> <b>Pergunta</b>
              </label>
              <textarea name="pergunta" class="form-control" id="pergunta" rows="3" placeholder="Escreva a sua pergunta" required>
                {{isset($pergunta) ? $pergunta->ds_pergunta : old('pergunta')}} 
              </textarea>
              <input type="hidden"  name="cd_pergunta" class="form-control" value="{{ isset($pergunta) ? $pergunta->cd_pergunta : '' }}">
            </div>
          </div>

            <h2> Alternativas</h2>
            <hr>

            <i><span class="text-danger">Não se esqueça de MARCAR a ALTERNATIVA CERTA</span></i>
            <div class="form-row">
            @if(isset($alternativas)) 

              @foreach($alternativas as $a)            
              <div class="form-group col-md-6">
                <label for="alternativaA">
                  <span class="text-danger">*</span> <b>Alternativa {{ $i }})</b>
                </label>
                <textarea name="alternativa{{ $i }}" value="teste" class="form-control" id="alternativa{{ $i }}" required>{{ (isset($a) && $a->fk_pergunta = $pergunta->cd_pergunta )? $a->ds_alternativa : old('alternativaA')}} </textarea>
                <input type="hidden" input type="text" name="cd_alternativa{{ $i }}" class="form-control" value="{{isset($a) ? $a->cd_alternativa : '' }}">
                <br>
            
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta{{ $i }}" name="opcao" value="{{ $i }}" class="custom-control-input" required {{(isset($a) && ($a->ic_alternativa == 1)) ? "checked" : ''}}>
                <label class="custom-control-label" for="opcaocerta{{ $i++ }}">Certa</label>
              </div>
 
            </div>
            @endforeach

            @else
            <div class="form-group col-md-6">
              <label for="alternativaA">
                <span class="text-danger">*</span> <b>Alternativa 1)</b>
              </label>
              <textarea name="alternativa0" value="teste" class="form-control" id="alternativa0" placeholder="Primeira Alternativa" required> </textarea>
              <br>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta0" name="opcao" class="custom-control-input" value="0" required>
                <label class="custom-control-label" for="opcaocerta0">Certa</label>
              </div>
            </div>
            <br>

            <div class="form-group col-md-6">
              <label for="alternativaB">
                <span class="text-danger">*</span> <b>Alternativa 2)</b>
              </label>
              <textarea name="alternativa1"  class="form-control" id="alternativa1"  placeholder="Segunda Alternativa" required></textarea>
              <br>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta1" name="opcao" value="1" class="custom-control-input" required>
                <label class="custom-control-label" for="opcaocerta1">Certa</label>
              </div>
            </div>
            <br>

            <div class="form-group col-md-6">
              <label for="alternativaC">
                <span class="text-danger">*</span> <b>Alternativa 3)</b>
              </label>
              <textarea name="alternativa2"  class="form-control" id="alternativa2" placeholder="Terceira Alternativa" required></textarea>
              <br>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta2" name="opcao" class="custom-control-input" value="2" required>
                <label class="custom-control-label" for="opcaocerta2">Certa</label>
              </div>
            </div>
            <br>

            <div class="form-group col-md-6">
              <label for="alternativaD">
                <span class="text-danger">*</span> <b>Alternativa 4)</b>
              </label>
              <textarea name="alternativa3"  class="form-control" id="alternativa3" placeholder="Quarta Alternativa" required></textarea>
              <br>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta3" name="opcao" class="custom-control-input" value="3" required>
                <label class="custom-control-label" for="opcaocerta3">Certa</label>
              </div>
            </div>
            <br>
            <div class="form-group col-md-6">
              <label for="alternativaE">
                <span class="text-danger">*</span> <b>Alternativa 5)</b>
              </label>
              <textarea name="alternativa4"  class="form-control" id="alternativa4" placeholder="Quinta Alternativa" required></textarea>
              <br>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta4" name="opcao" class="custom-control-input" value="4" required>
                <label class="custom-control-label" for="opcaocerta4">Certa</label>
              </div>
            </div>
          </div>
          @endif
            <div class="form-group col-md-8">
            <button type="submit" class="btn btn-success" >Salvar Dados</button>
            @if(!isset($vaga))
              <button type="reset" class="btn btn-primary">Limpar</button>
            @endif
          </div>

        </fieldset>
      </form>
    </div>
  </div>
             

@endsection