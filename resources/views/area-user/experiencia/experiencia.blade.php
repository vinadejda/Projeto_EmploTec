@extends('area-user.layout.template')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Experiencias Relevantes</h2>
            </div>
            <div class="panel-body">
                @if(!count($exp) > 0)
                    <div class="alert alert-warning">
                        Você ainda não cadastrou nenhuma experiência.
                    </div>
                    <a href="{{url('/painel/candidato/experiencia/adiciona')}}" class="btn btn-primary btn-add">Cadastrar Experiencia</a><br>
                @else
                    @if(old('nome'))
                        <div class="alert alert-success">
                            <strong>Nós desejamos  muito Sucesso para você!</strong>
                        </div>
                    @endif
                    
                     @foreach ($exp as $e)
                    
                                    <label><strong> Nome do Cargo: </strong> {{$e->nm_cargo_experiencia }}</label><br>
                                    <label><strong> Descrição: </strong> {{$e->ds_experiencia}} </label><br>
                                    <label><strong> Nome da Empresa: </strong> {{$e->nm_empresa}} </label><br>
                                    <label><strong> Segmento: </strong> {{$e->ds_segmento_empresa }}</label><br>
                                    <label><strong> Salário: </strong> {{$e->vl_salario}},00 </label><br>
                                    <label><strong> Inicio: </strong> {{$e->dt_inicio_experiencia}} </label><br>
                                    <label><strong> Termino: </strong> {{(!isset($e->dt_termino_experiencia)) ? "Atual"  : $e->dt_termino_experiencia }} </label><br>
                               
                            @endforeach
                
            </div>
        </div>
          <a href="{{url('/painel/candidato/experiencia/edita')}}" class="btn btn-primary btn-add">Editar Experiencia</a> 
          @endif
    </div>
</div>

@endsection