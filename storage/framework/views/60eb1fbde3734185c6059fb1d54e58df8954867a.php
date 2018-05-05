<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Experiências Relevantes</h2>
            </div>
            <div class="panel-body">
                <?php if(!count($exp) > 0): ?>
                    <div class="alert alert-warning">
                        Você ainda não cadastrou nenhuma experiência.
                    </div>
                    <a href="<?php echo e(url('/painel/candidato/experiencia/adiciona')); ?>" class="btn btn-primary btn-add">Cadastrar Experiência</a><br>
                <?php else: ?>
                    <?php if(old('nome')): ?>
                        <div class="alert alert-success">
                            <strong>Nós desejamos  muito Sucesso para você!</strong>
                        </div>
                    <?php endif; ?>
                    
                     <?php $__currentLoopData = $exp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                                    <label><strong> Nome do Cargo: </strong> <?php echo e($e->nm_cargo_experiencia); ?></label><br>
                                    <label><strong> Descrição: </strong> <?php echo e($e->ds_experiencia); ?> </label><br>
                                    <label><strong> Nome da Empresa: </strong> <?php echo e($e->nm_empresa); ?> </label><br>
                                    <label><strong> Segmento: </strong> <?php echo e($e->ds_segmento_empresa); ?></label><br>
                                    <label><strong> Salário: </strong> <?php echo e($e->vl_salario); ?>,00 </label><br>
                                    <label><strong> Inicio: </strong> <?php echo e($e->dt_inicio_experiencia); ?> </label><br>
                                    <label><strong> Termino: </strong> <?php echo e((!isset($e->dt_termino_experiencia)) ? "Atual"  : $e->dt_termino_experiencia); ?> </label><br>
                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        </div>
          <a href="<?php echo e(url('/painel/candidato/experiencia/edita')); ?>" class="btn btn-primary btn-add">Editar Experiencia</a> 
          <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-user.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>