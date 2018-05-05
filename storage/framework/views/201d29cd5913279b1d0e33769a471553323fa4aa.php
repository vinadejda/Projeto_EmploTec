<?php $__env->startSection('content'); ?>
	<div class="container-fluid caixa-vagas ">
    	<div class="card-body">
    		<?php if(isset($vaga)): ?>
    			<section name="dados-vaga">
		    		<h2>Dados da Vaga</h2>
		    		<p><strong>Nome da Vaga:</strong> <?php echo e($vaga->nm_vaga); ?></p>
		    		<p><strong>Área de TI:</strong> <?php echo e($vaga->areaTI->nm_areaTI); ?></p>
		    		<p><strong>Quantidade de Vagas:</strong> <?php echo e($vaga->qt_vagas); ?></p>
		    		<p><strong>Salário:</strong> <?php echo e($vaga->vl_salario_vaga); ?></p>
		    		<p><strong>Nível:</strong> <?php echo e($vaga->ds_nivel); ?></p>
		    		<p><strong>Tipo de Contratação:</strong> <?php echo e($vaga->nm_contratacao); ?></p>
		    		<p><strong>Cidade:</strong> <?php echo e($vaga->vl_salario_vaga); ?></p>
		    		<p><strong>Data de Expiração:</strong> <?php echo e($vaga->dt_expiracao); ?></p>
		    		<p><strong>Beneficios:</strong>
		    			<ul>
		    				<?php if($vaga->ic_vale_transporte): ?><li>Vale Transporte</li><?php endif; ?>  				
		    				<?php if($vaga->ic_vale_alimentacao): ?><li>Vale Alimentação</li><?php endif; ?>
		    				<?php if($vaga->ic_plano_saude): ?><li>Plano de saúde</li><?php endif; ?>
		    				<?php if($vaga->ic_plano_saude): ?><li>Plano de Saúde</li><?php endif; ?>
		    				<?php if($vaga->ic_plano_dentario): ?><li>Plano Dentario</li><?php endif; ?>
		    				<?php if($vaga->ic_seguro_vida): ?><li>Seguro de Vida</li><?php endif; ?>
		    			</ul>
		    		</p>
		    	</section><HR>
		    	<section name="dados-perfil-vaga">
		    		<h2>Perfil da Vaga</h2>
		    		<?php if(empty($perfil)): ?>
			    		<div class="form-group col-md-12">
			    			<p class="text-danger">Sua vaga não possui nenhum perfil desejado cadastrado!</p>
			            	<a href="/painel/empresa/vagas/perfil/cadastro/<?php echo e($vaga->cd_vaga); ?>" class="btn btn-primary btn-add">Cadastrar Perfil</a><br>
			            	<?php if(!isset($vaga)): ?>
			              		<button type="reset" class="btn btn-primary">Limpar</button>
			            	<?php endif; ?>
			          	</div>
			        <?php else: ?>
			        	<p><strong>Nome do Perfil:</strong> <?php echo e($perfil->nm_perfil_vaga); ?></p>
			    		<p><strong>Gênero:</strong> <?php echo e($perfil->ds_genero); ?></p>
			    		<p><strong>Idade:</strong> <?php echo e($perfil->nr_idade); ?></p>
			    		<p><strong>Formação:</strong> <?php echo e($perfil->ds_formacao); ?></p>
			    		<p><strong>Competências:</strong> <?php echo e($perfil->ds_interresse); ?></p>
		          	<?php endif; ?>	
		    	</section>
    		<?php endif; ?>
    	</div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-empresa.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>