@extends('area-empresa.layout.template')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <a href="{{url('/empresa/vagas/cadastro')}}" class="btn btn-primary btn-add">Cadastrar Vaga</a><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Listagem de Vagas
            </div>
            <div class="panel-body">
                @if(!count($vagas) > 0)
                    <div class="alert alert-warning">
                        Nenhuma vaga cadastrada.
                    </div>
                @else
                    @if(old('nome'))
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> A vaga "{{old('nome')}}" foi adicionada.
                        </div>
                    @endif
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-vagas">
                        <thead>
                            <tr>
                                <th>Cargo</th>
                                <th>Nivel</th>
                                <th>Localidade</th>
                                <th>Salário</th>
                                <th>Quantidade</th>
                                <th>Data Expiração</th>
                                <th colspan="3">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vagas as $vaga)
                                <tr>
                                    <td> {{$vaga->nm_vaga}} </td>
                                    <td> {{$vaga->ds_nivel }}</td>
                                    <td> {{$vaga->ds_localidade}} </td>
                                    <td> {{$vaga->qt_vagas}} </td>
                                    <td> {{$vaga->vl_salario_vaga }}</td>
                                    <td> {{$vaga->dt_expiracao}} </td>
                                    <td alt="Detalhes">
                                        <a href="empresa/vagas/mostra/{{$vaga->cd_vaga}}"><span class="fa fa-eye" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a href="/empresa/vagas/editar/{{$vaga->cd_vaga}}" alt="Editar" class="teste"><span class="fa fa-edit" aria-hidden="true"></span></a>
                                    </td>
                                    <td class="excluir" >
                                        <a href="javascript:func" onclick="alertConfirmaExclusao('/empresa/vagas/remove/{{$vaga->cd_vaga}}')" alt="Excluir"><span class="fa fa-trash-o" aria-hidden="true" ></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script>
                        function alertConfirmaExclusao(link) {
                            var acao = confirm("Deseja realmente excluir este registro?")
                            if (acao){
                                window.location = link;
                            }
                        }
                    </script>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection