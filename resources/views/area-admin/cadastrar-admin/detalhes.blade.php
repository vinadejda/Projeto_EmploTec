@extends('area-admin.layout.template')

@section('content')
	<div class="container-fluid caixa-vagas ">
    	<div class="card-body">
    		@if(isset($adm))
    			<section name="dados-vaga">
		    		<h2>Dados do Admin</h2>
		    		<p><strong>Nome:</strong> {{$adm->name}}</p>
		    		<p><strong>Email:</strong> {{ $adm->email }}</p>
		    		<p><strong>Rua:</strong> {{$adm->ds_rua}}</p>
		    		<p><strong>N°:</strong> {{$adm->nr_endereco}}</p>
		    		<p><strong>Bairro:</strong> {{$adm->ds_bairro}}</p>
		    		@if($adm->ds_complemento)<p><strong>Complemento:</strong> {{$adm->ds_complemento}}</p>@endif  
		    		@if($adm->nr_tel)<p><strong>Telefone:</strong> {{$adm->nr_tel}}</p>@endif  
		    		@if($adm->nr_cel)<p><strong>Celular:</strong> {{$adm->nr_cel}}</p>@endif  
		    		@if($adm->link_linkedin)<p><strong>Linkedin:</strong> {{$adm->link_linkedin}}</p>@endif
		    		@if($adm->link_facebook)<p><strong>Facebook:</strong> {{$adm->link_facebook}}</p>@endif
		    		@if($adm->link_twitter)<p><strong>Twitter:</strong> {{$adm->link_twitter}}</p>@endif
		    		
<a href="{{url('/painel/admin/lista')}}" class="btn btn-primary btn-add">Voltar</a>		    	
    		@endif
    	</div>
    </div>
@endsection