<?php $__env->startSection('content'); ?>

<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Cadastro do Candidato')); ?></div>

                <!--<div class="card-header"><?php echo e(__('Registra-se')); ?></div>-->


                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>
                        <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span><?php echo e(__('Nome Completo')); ?>

                            </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span><?php echo e(__('E-mail')); ?>

                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span><?php echo e(__('Senha')); ?>

                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span><?php echo e(__('Confirmar Senha')); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span><?php echo e(__('Endereço')); ?></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" name="rua" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span><?php echo e(__('Número')); ?>

                            </label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="number" class="form-control" name="nr" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Complemento')); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" name="complemento" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span><?php echo e(__('Bairro')); ?>

                            </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" name="bairro" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Estado')); ?></label>
                            <div class="col-md-6">
                                <select name="estado" class="form-control">
                                    <option selected="selected"></option>
                                    <?php $__currentLoopData = $estado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($e->cd_estado); ?>"><?php echo e($e->nm_estado); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Cidade')); ?></label>
                            <div class="col-md-6">
                                <select name="cidade" class="form-control">
                                    <option selected></option>
                                    <?php $__currentLoopData = $cidade; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c->cd_cidade); ?>"><?php echo e($c->nm_cidade); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Telefone')); ?></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="tel" class="form-control" name="tel" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Celular')); ?></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="tel" class="form-control" name="celular" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Imagem de perfil')); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="file"  name="img">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Linkedin')); ?></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="url" class="form-control" name="linkedin" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Facebook')); ?></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="url" class="form-control" name="facebook" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Twitter')); ?></label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="url" class="form-control" name="twitter" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Portifolio')); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="url" class="form-control" name="portifolio" >
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
<br><br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>