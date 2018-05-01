@extends('area-admin.layout.template')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Informações do Admin</h2>
            </div>
            <div class="panel-body">
                    @if(old('nome'))
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> Atualizações realizadas com sucesso!
                        </div>
                    @endif
                            @foreach ($admin as $adm)
                                <p>Nome: {{ $adm->name }}</p>
                                <p>Email: {{ $adm->email }}</p>
                                <p>Rua: {{ $adm->ds_rua }}</p>
                                <p>N°: {{ $adm->nr_endereco }}</p>
                                <p>Bairro: {{ $adm->ds_bairro }}</p>
                                <p>{{ $adm->ds_complemento != NULL ? "Complemento:  $adm->ds_complemento " :""}}</p>
                                <p> {{ $adm->nr_tel != NULL ? "Telefone: $adm->nr_tel" :""}}</p>
                                <p>{{ $adm->nr_cel != NULL ? "Celular:  $adm->nr_cel " :""}}</p>
                                <p>{{ $adm->link_linkedin != NULL ? "Linkedin:  $adm->link_linkedin " :""}}</p>
                                <p>{{ $adm->link_facebook != NULL ? "Facebook:  $adm->link_facebook " :""}}</p>
                                 <p>{{ $adm->link_twitter != NULL ? "Twitter:  $adm->link_twitter " :""}}</p>
                               
                            @endforeach
                
            </div>
            <a href="{{url('/painel/admin/cadastrarnovo')}}" class="btn btn-primary btn-add">Atualizar Informações</a>
        </div>
    </div>
</div>

@endsection