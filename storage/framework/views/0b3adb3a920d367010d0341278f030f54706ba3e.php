<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Curriculo</h2>
            </div>
            <div class="panel-body">
                <?php if(!count($curriculo) > 0): ?>
                    <div class="alert alert-warning">
                        Você ainda não cadastrou nenhuma Curriculo.
                    </div>
                    <a href="<?php echo e(url('/painel/candidato/curriculo/adiciona')); ?>" class="btn btn-primary btn-add">Cadastrar Curriculo</a><br>
                <?php else: ?>
                    <?php if(old('nome')): ?>
                        <div class="alert alert-success">
                            <strong>Nós desejamos  muito Sucesso para você!</strong>
                        </div>
                    <?php endif; ?>
                    
                     <?php $__currentLoopData = $curriculo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                                    <label><strong> Objetivo Profissional: </strong> <?php echo e($c->ds_objetivo_profissional); ?></label><br>
                                    <label><strong> Pretenção Salarial: </strong> <?php echo e($c->vl_prentencao_salarial); ?> </label><br>
                                    <label><strong> Informações Complementares: </strong> <?php echo e($c->ds_info_complementar); ?></label><br>
                                    <label><strong> Resumo Profissional: </strong> <?php echo e($c->ds_resumo_profissional); ?> </label><br>
                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
            </div>
        </div>
        <a href="<?php echo e(url('/painel/candidato/curriculo/edita')); ?>" class="btn btn-primary btn-add">Editar Curriculo</a>   
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-user.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>