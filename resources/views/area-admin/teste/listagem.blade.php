@extends('area-admin.layout.template')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Lista de Teste Existentes</h2>
                <hr>
            </div>
            <div class="panel-body">
                <a href="{{url('/painel/admin/testes/cadastra')}}" class="btn btn-primary btn-add">Cadastrar Novo Teste</a>
            <br><br>
                
            @foreach($pergunta as $p)
                @if(!isset($p))
                    <div class="alert alert-warning">
                        Nenhum teste cadastrado.
                    </div>
                    @else
                    <article class="card col-lg-12" >  
                      <div class="card-body">
                        
                                <h3 class="card-title">Questão: </h3>
                                @foreach($areasTI as $aTI)
                                    @if($p->fk_areaTI == $aTI->cd_areaTI)
                                        <p class="card-text"><b>Área: </b>{{ $aTI->nm_areaTI }}</p>
                                    @endif
                                 @endforeach
                                <p class="card-text">{{ $p->ds_pergunta }}</p>
                              </div>
                              @foreach($alternativas as $a)
                                    @if($a->fk_pergunta == $p->cd_pergunta)
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i class="{{ ($a->ic_alternativa == 1) ? 'fa fa-check' : 'fa fa-times'}}" aria-hidden="true"></i>
                                             {{ $a->ds_alternativa}} </li>
                                         </ul>
                                    @endif
                                @endforeach
                                <div class="card-body">
                                <a href="/painel/admin/testes/editar/{{$p->cd_pergunta}}" class="card-link col-lg-4" alt="Editar">
                                    <span class="fa fa-edit" aria-hidden="true"></span>
                                    Alterar Questão
                                </a>
                                <a href="javascript:func" onclick="alertConfirmaExclusao('/painel/admin/testes/remove/{{$p->cd_pergunta}}')" alt="Excluir" class="card-link col-lg-4">
                                    <span class="fa fa-trash-o" aria-hidden="true" ></span>
                                    Excluir Questão
                                </a>
                            </div>
                             
                      </div>
                    </article>
                    <br>
                         @endif
                        @endforeach   
                                

                    <script>
                        function alertConfirmaExclusao(link) {
                            var acao = confirm("Deseja realmente excluir este registro?")
                            if (acao){
                                window.location = link;
                            }
                        }
                    </script>
                
            </div>
        </div>
    </div>
</div>

@endsection