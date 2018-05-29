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
<section class="row">
  <form method="post" action="{{ '/painel/candidato/vagas/testes/concluir' }}">
    <fieldset>
      <legend>Teste sobre {{$areaTI->nm_areaTI}}</legend>
      @csrf
    @foreach($perguntas as $p) 
    <input type="hidden" name="id" value="{{ $areaTI->cd_areaTI}}">          
        <article class="card" > 
            <div class="card-header">
                <h3 class="card-title">Questão {{$numero++}}: </h3>
                <h4 class="card-text">{{ $p->ds_pergunta }}</h4>
            </div> 
            <div class="card-body">    
                <ul class="list-group list-group-flush">
                  @foreach($alternativas as $a)
                      @if($a->fk_pergunta == $p->cd_pergunta)
                          <li class="list-group-item">
                              <p> <input type="radio" name="{{$p->cd_pergunta}}" value="{{$a->cd_alternativa}}">
                                  {{ $a->ds_alternativa}}</p>
                          </li> 
                      @endif
                  @endforeach
                </ul> </div>
        </article>
        <br>                    
    @endforeach
     <div class="form-group col-md-8">
        <button type="submit" class="btn btn-success" >Finalizar</button>
        <button type="reset" class="btn btn-primary">Limpar</button>
      </div>
    </fieldset>
  </form>                          
</section>
            
@endsection