<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="alert alert-danger"><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="card-header"><?php echo e(__('Mais Informações')); ?></div>

                <div class="card-body">
                    
                    <form method="POST" action="<?php echo e(route('cadastro-empresa')); ?>">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>  
                        
                        <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span><?php echo e(__('CNPJ')); ?>

                            </label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="cnpj" required value="<?php echo e(isset($info) ? $info->cd_cnpj : old('cnpj')); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span><?php echo e(__('Razão Social')); ?>

                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rz_social"  required value="<?php echo e(isset($info) ? $info->ds_razao_social : old('rz_social')); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Cadastrar')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>