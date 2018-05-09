@extends('area-admin.layout.template')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h2> Lista de Administradores Cadastrados</h2>
               <br>
            </div>
            <div class="panel-body">
                @if(!count($adm) > 0)
                    <div class="alert alert-warning">
                        Nennhum administrador cadastrado.
                    </div>
                    <a href="{{url('/painel/admin/cadastrarnovo')}}" class="btn btn-primary btn-add">Cadastrar Administrador</a>
                @else
                    @if(old('nome'))
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> A vaga "{{old('nome')}}" foi adicionada.
                        </div>
                    @endif
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-vagas">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>Celular</th>
                                
                                <th colspan="2">Opções</th>
                            </tr>
                        </thead>


                                
                               
                        <tbody>
                            @foreach ($adm as $a)
                                <tr>
                                    <td> {{$a->name}} </td>
                                    <td> {{$a->email }}</td>
                                    <td> R: {{$a->ds_rua }}, 
                                        N° {{ $a->nr_endereco}}, 
                                        {{ $a->ds_bairro}} 
                                        {{ $a->ds_complemento != NULL ? " , Complemento:  $a->ds_complemento " :""}}
                               </td>
                                    <td> {{ $a->nr_tel != NULL ? "Telefone: $a->nr_tel" :" ----"}}</td>
                                    <td> {{ $a->nr_cel != NULL ? "Celular:  $a->nr_cel " :"-----"}}</td>
                                    
                                    <td alt="Detalhes">
                                        <a href="/painel/admin/mostra/{{$a->id}}"><span class="fa fa-eye" aria-hidden="true"></span></a>
                                    </td>
                                    
                                    <td class="excluir" >
                                        <a href="javascript:func" onclick="alertConfirmaExclusao('/painel/admin/remove/{{$a->id}}')" alt="Excluir"><span class="fa fa-trash-o" aria-hidden="true" ></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                     <a href="{{url('/painel/admin/cadastrarnovo')}}" class="btn btn-primary btn-add">Cadastrar Administrador</a>
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