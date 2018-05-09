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
                @if(!count($candidato) > 0)
                    <div class="alert alert-warning">
                        Você ainda não se candidatou a nenhuma vaga.
                    </div>
                @else
                    @if(old('nome'))
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> A vaga "{{old('nome')}}" foi adicionada.
                        </div>
                    @endif
                    
                            @foreach ($vagas as $vaga)
                                <div class="card" >
                                    
                                    <img class="card-img-top" src="/../images/vaga-programador.jpg" alt="Card image cap">
                                    <div class="card-body">
                                    <h4 class="card-title"><b>{{$vaga->nm_vaga}}</b></h4>
                                        <p class="card-text">{{$vaga->areaTI->nm_areaTI}} </p> 
                                        <p class="card-text">{{$vaga->ds_nivel }}</p> 
                                        <p class="card-text">
                                            <i class="fa fa-usd" aria-hidden="true"></i>
                                            {{$vaga->vl_salario_vaga }}
                                        </p>
                                        <p>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                {{$vaga->cidade->nm_cidade}}
                                        </p>
                                        <p>
                                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                                            {{$vaga->empresa->ds_razao_social}}
                                        </p>
                                    <a href="#" class="btn btn-primary">Visualizar Vaga</a>
                                  </div>
                                </div>
                                                
                            @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection