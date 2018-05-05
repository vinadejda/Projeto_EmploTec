<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Informações do Admin</h2>
            </div>
            <div class="panel-body">
                    <?php if(old('nome')): ?>
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> Atualizações realizadas com sucesso!
                        </div>
                    <?php endif; ?>
                            <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p>Nome: <?php echo e($adm->name); ?></p>
                                <p>Email: <?php echo e($adm->email); ?></p>
                                <p>Rua: <?php echo e($adm->ds_rua); ?></p>
                                <p>N°: <?php echo e($adm->nr_endereco); ?></p>
                                <p>Bairro: <?php echo e($adm->ds_bairro); ?></p>
                                <p><?php echo e($adm->ds_complemento != NULL ? "Complemento:  $adm->ds_complemento " :""); ?></p>
                                <p> <?php echo e($adm->nr_tel != NULL ? "Telefone: $adm->nr_tel" :""); ?></p>
                                <p><?php echo e($adm->nr_cel != NULL ? "Celular:  $adm->nr_cel " :""); ?></p>
                                <p><?php echo e($adm->link_linkedin != NULL ? "Linkedin:  $adm->link_linkedin " :""); ?></p>
                                <p><?php echo e($adm->link_facebook != NULL ? "Facebook:  $adm->link_facebook " :""); ?></p>
                                 <p><?php echo e($adm->link_twitter != NULL ? "Twitter:  $adm->link_twitter " :""); ?></p>
                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
            <a href="<?php echo e(url('/painel/admin/perfil/edita')); ?>" class="btn btn-primary btn-add">Atualizar Informações</a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-admin.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>