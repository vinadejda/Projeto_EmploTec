@extends('area-empresa.layout.template')

@section('content')
	<div class="container-fluid caixa-vagas ">
    	<div class="card-body">
    		@if(isset($vaga))
    			<section name="dados-vaga">
		    		<h2>Dados da Vaga</h2>
		    		<p><strong>Nome da Vaga:</strong> {{$vaga->nm_vaga}}</p>
		    		<p><strong>Área de TI:</strong> {{ $vaga->areaTI->nm_areaTI }}</p>
		    		<p><strong>Quantidade de Vagas:</strong> {{$vaga->qt_vagas}}</p>
		    		<p><strong>Salário:</strong> {{$vaga->vl_salario_vaga}}</p>
		    		<p><strong>Nível:</strong> {{$vaga->ds_nivel}}</p>
		    		<p><strong>Tipo de Contratação:</strong> {{$vaga->nm_contratacao}}</p>
		    		<p><strong>Cidade:</strong> {{$vaga->vl_salario_vaga}}</p>
		    		<p><strong>Data de Expiração:</strong> {{$vaga->dt_expiracao}}</p>
		    		<p><strong>Beneficios:</strong>
		    			<ul>
		    				@if($vaga->ic_vale_transporte)<li>Vale Transporte</li>@endif  				
		    				@if($vaga->ic_vale_alimentacao)<li>Vale Alimentação</li>@endif
		    				@if($vaga->ic_plano_saude)<li>Plano de saúde</li>@endif
		    				@if($vaga->ic_plano_saude)<li>Plano de Saúde</li>@endif
		    				@if($vaga->ic_plano_dentario)<li>Plano Dentario</li>@endif
		    				@if($vaga->ic_seguro_vida)<li>Seguro de Vida</li>@endif
		    			</ul>
		    		</p>
		    	</section><HR>
		    	<section name="dados-perfil-vaga">
		    		<h2>Perfil da Vaga</h2>
		    		@if(!isset($perfil))
			    		<div class="form-group col-md-12">
			    			<p class="text-danger">Sua vaga não possui nenhum perfil desejado cadastrado!</p>
			            	<a href="/painel/empresa/vagas/perfil/cadastro/{{$vaga->cd_vaga}}" class="btn btn-primary btn-add">Cadastrar Perfil</a><br>
			            	@if(!isset($vaga))
			              		<button type="reset" class="btn btn-primary">Limpar</button>
			            	@endif
			          	</div>
			        @else
			        	<p>dados aqui</p>
		          	@endif	
		    	</section>
    		@endif
    	</div>
    </div>
@endsection