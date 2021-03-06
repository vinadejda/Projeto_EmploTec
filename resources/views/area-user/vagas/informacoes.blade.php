@extends('area-user.layout.template')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Vagas Candidatadas
            </div>
            <div class="panel-body">
                @if(!count($vagasCandidato) > 0)
                    <div class="alert alert-warning">
                        Você ainda não se candidatou a nenhuma vaga.
                    </div>
                @else
                    @if(old('nome'))
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> A vaga "{{old('nome')}}" foi adicionada.
                        </div>
                    @endif
                    
                    @foreach ($vagas as $vagaCandidatada)
                        <div class="card col-md-4 responsive-wrap" >
                            
                            <img class="card-img-top" src="/../images/vaga-programador.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h4 class="card-title"><b>{{$vagaCandidatada->nm_vaga}}</b></h4>
                                <p class="card-text">{{$vagaCandidatada->nm_areaTI}} </p> 
                                <p class="card-text">{{$vagaCandidatada->ds_nivel }}</p> 
                                <p class="card-text">
                                    <i class="fa fa-usd" aria-hidden="true"></i>
                                    {{$vagaCandidatada->vl_salario_vaga }}
                                </p>
                                <p>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        {{$vagaCandidatada->nm_cidade}}
                                </p>
                                <p>
                                    <i class="fa fa-sitemap" aria-hidden="true"></i>
                                    {{$vagaCandidatada->ds_razao_social}}
                                </p>
                            @if($vagaCandidatada->qtd == 0)
                                <a href="/painel/candidato/vagas/testes/realizar/{{$vagaCandidatada->cd_areaTI}}" class="btn btn-primary">Realizar Teste</a>
                            @else
                                <a href="#" class="btn btn-success" disabled>Teste Realizado</a>
                            @endif
                          </div>
                        </div>
                                        
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection