@extends('area-empresa.layout.template')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <a href="{{url('/painel/empresa/vagas/perfil/cadastro')}}" class="btn btn-primary btn-add">Cadastrar Perfil</a><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Listagem de Perfis de Vagas
            </div>
            <div class="panel-body">
                @if(!count($perfis) > 0)
                    <div class="alert alert-warning">
                        Nenhum perfil cadastrado.
                    </div>
                @else
                    @if(old('nome'))
                        <div class="alert alert-success alert-dismissable">
                            <strong>Sucesso!</strong> O Perfil "{{old('nome')}}" foi adicionado.
                        </div>
                    @endif
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-vagas">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Gênero</th>
                                <th>Idade</th>
                                <th>Formação</th>
                                <th>Competências</th>
                                <th>Vaga</th>
                                <th colspan="2">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perfis as $perfil)
                                <tr>
                                    <td> {{$perfil->nm_perfil_vaga }}</td>
                                    <td> {{$perfil->ds_genero}} </td>
                                    <td> {{$perfil->nr_idade }}</td>
                                    <td> {{$perfil->ds_formacao }} </td>
                                    <td> {{$perfil->ds_interresse}} </td>
                                    <td> {{$perfil->nm_vaga}} </td>
                                    <!--
                                    <td alt="Detalhes">
                                        <a href="/painel/empresa/perfil/mostra/{{$perfil->cd_perfil_vaga}}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                	-->
                                    <td>
                                        <a href="/painel/empresa/perfil/editar/{{$perfil->cd_perfil_vaga}}" alt="Editar" class="teste">
                                            <span class="fa fa-edit" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                    <td class="excluir" >
                                        <a href="javascript:func" onclick="alertConfirmaExclusao('/painel/empresa/perfil/remove/{{$perfil->cd_perfil_vaga}}')" alt="Excluir">
                                            <span class="fa fa-trash-o" aria-hidden="true" ></span>
                                        </a>
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