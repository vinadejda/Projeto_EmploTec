@extends('area-user.layout.template')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Curriculo</h2>
            </div>
            <div class="panel-body">
                @if(!count($curriculo) > 0)
                    <div class="alert alert-warning">
                        Você ainda não cadastrou nenhuma Curriculo.
                    </div>
                    <a href="{{url('/painel/candidato/curriculo/adiciona')}}" class="btn btn-primary btn-add">Cadastrar Curriculo</a><br>
                @else
                    @if(old('nome'))
                        <div class="alert alert-success">
                            <strong>Nós desejamos  muito Sucesso para você!</strong>
                        </div>
                    @endif
                    
                     @foreach ($curriculo as $c)
                    
                                    <label><strong> Objetivo Profssisional: </strong> {{$c->ds_objetivo_profissional }}</label><br>
                                    <label><strong> Pretenção Salarial: </strong> {{$c->vl_prentencao_salarial}} </label><br>
                                    <label><strong> Informações Complementares: </strong> {{$c->ds_info_complementar }}</label><br>
                                    <label><strong> Resumo Profissional: </strong> {{$c->ds_resumo_profissional}} </label><br>
                               
                            @endforeach         
            </div>
        </div>
        <a href="{{url('/painel/candidato/curriculo/edita')}}" class="btn btn-primary btn-add">Editar Curriculo</a>   
        @endif
    </div>
</div>

@endsection