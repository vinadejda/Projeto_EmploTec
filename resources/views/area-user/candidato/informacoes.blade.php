@extends('area-user.layout.template')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
       
        <div class="panel panel-default">
            <div class="panel-heading">
               <h2> Suas Informações</h2>
            </div>
            <div class="panel-body">
                @if(!count($candidato) > 0)
                    <div class="alert alert-warning">
                        Você ainda não terminou o seu cadastro :( <br>Melhor fazer isso o mais rápido possível
                    </div>
                    <a href="{{url('/painel/candidato/dados/adiciona')}}" class="btn btn-primary btn-add">Continuar Cadastro</a><br>
                @else
                    @if(old('nome'))
                        <div class="alert alert-success">
                            <strong>Nós desejamos  muito Sucesso para você!</strong>
                        </div>
                    @endif
                    
                            @foreach ($candidato as $c)
                                
                                    <label><strong> CPF: </strong>{{$c->cd_cpf}} </label><br>
                                    <label><strong> Estado Civil: </strong> {{$c->ds_estado_civil }}</label><br>
                                    <label><strong> Genero: </strong> {{$c->ic_genero}} </label><br>
                                    <label><strong> Data Nascimento: </strong> {{$c->dt_nascimento}} </label><br>
                                    <label><strong> Nacionalidade: </strong> {{$c->ds_nacionalidade }}</label><br>
                                    <label><strong> Deficiencia: </strong> 
                                        @if(!isset($c->fk_deficiencia))
                                            Não
                                        @else
                                        @foreach($deficiencia as $d)
                                            {{ $c->fk_deficiencia == $d->cd_deficiencia ? $d->nm_deficiencia : ''  }}
                                        @endforeach
                                        @endif
                                         </label><br>
                                    <!--td alt="Detalhes">
                                        <a href="/painel/empresa/vagas/mostra/{{$c->cd_cpf}}"><span class="fa fa-eye" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a href="/painel/empresa/vagas/editar/{{$c->cd_cpf}}" alt="Editar" class="teste"><span class="fa fa-edit" aria-hidden="true"></span></a>
                                    </td>
                                    <td class="excluir" >
                                        <a href="javascript:func" onclick="alertConfirmaExclusao('/painel/empresa/vagas/remove/{{$c->cd_cpf}}')" alt="Excluir"><span class="fa fa-trash-o" aria-hidden="true" ></span></a>
                                    </td-->
                               
                            @endforeach

                    <script>
                        function alertConfirmaExclusao(link) {
                            var acao = confirm("Deseja realmente excluir o seu cadastro?")
                            if (acao){
                                window.location = link;
                            }
                        }
                    </script>
                
            </div>
        </div>
         <a href="{{url('/painel/candidato/dados/edita')}}" class="btn btn-primary btn-add">Atualizar Informações</a><br>
         @endif
    </div>
</div>

@endsection