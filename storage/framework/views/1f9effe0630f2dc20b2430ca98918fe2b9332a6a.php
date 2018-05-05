<?php $__env->startSection('content'); ?>
	<div class="container-fluid caixa-vagas ">
    	<div class="card-body">
    		<?php if(isset($adm)): ?>
    			<section name="dados-vaga">
		    		<h2>Dados do Admin</h2>
		    		<p><strong>Nome:</strong> <?php echo e($adm->name); ?></p>
		    		<p><strong>Email:</strong> <?php echo e($adm->email); ?></p>
		    		<p><strong>Rua:</strong> <?php echo e($adm->ds_rua); ?></p>
		    		<p><strong>N°:</strong> <?php echo e($adm->nr_endereco); ?></p>
		    		<p><strong>Bairro:</strong> <?php echo e($adm->ds_bairro); ?></p>
		    		<?php if($adm->ds_complemento): ?><p><strong>Complemento:</strong> <?php echo e($adm->ds_complemento); ?></p><?php endif; ?>  
		    		<?php if($adm->nr_tel): ?><p><strong>Telefone:</strong> <?php echo e($adm->nr_tel); ?></p><?php endif; ?>  
		    		<?php if($adm->nr_cel): ?><p><strong>Celular:</strong> <?php echo e($adm->nr_cel); ?></p><?php endif; ?>  
		    		<?php if($adm->link_linkedin): ?><p><strong>Linkedin:</strong> <?php echo e($adm->link_linkedin); ?></p><?php endif; ?>
		    		<?php if($adm->link_facebook): ?><p><strong>Facebook:</strong> <?php echo e($adm->link_facebook); ?></p><?php endif; ?>
		    		<?php if($adm->link_twitter): ?><p><strong>Twitter:</strong> <?php echo e($adm->link_twitter); ?></p><?php endif; ?>
		    		
<a href="<?php echo e(url('/painel/admin/lista')); ?>" class="btn btn-primary btn-add">Voltar</a>		    	
    		<?php endif; ?>
    	</div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-admin.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>