<?php $__env->startSection('content'); ?>

  <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  <?php endif; ?>
  <div class="container-fluid caixa-vagas ">
  

      <div class="card-body">
        <form role="form" method="post" action="<?php echo e('/painel/admin/perfil/altera'); ?>">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>

            <div class="form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Nome
              </label>
              <input type="text" name="nome" class="form-control" placeholder="Nome da vaga" required="required" value="<?php echo e(isset($admin) ? $admin->name : old('nome')); ?>">
            </div>

            <div class="form-group col-md-6">
              <label for="localidade">
                <span class="text-danger">* </span> Rua
              </label>
              <input type="text" name="rua" class="form-control" placeholder="Localidade da vaga" required="required" value="<?php echo e(isset($admin) ? $admin->ds_rua : old('rua')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> N°
              </label>
              <input type="number" name="numero" class="form-control" required="required" value="<?php echo e(isset($admin) ? $admin->nr_endereco : old('numero')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="quantidade">
                <span class="text-danger">* </span> Bairro
              </label>
              <input name="bairro" type="text" class="form-control" placeholder="Bairro" required="required" value="<?php echo e(isset($admin) ? $admin->ds_bairro : old('bairro')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Complemento
              </label>
              <input type="text" name="complemento" class="form-control" placeholder="Complemento"   value="<?php echo e(isset($admin) ? $admin->ds_complemento : old('complemento')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Telefone
              </label>
              <input type="number" name="telefone" class="form-control" placeholder="Telefone"   value="<?php echo e(isset($admin) ? $admin->nr_tel : old('telefone')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Celular
              </label>
              <input type="number" name="celular" class="form-control" placeholder="Celular"   value="<?php echo e(isset($admin) ? $admin->nr_cel : old('celular')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Imagem
              </label>
              <input type="file" name="img" class="form-control" placeholder="Complemento"  value="<?php echo e(isset($admin) ? $admin->im_perfil : old('img')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Linkedin
              </label>
              <input type="text" name="linkedin" class="form-control" placeholder="Linkedin"   value="<?php echo e(isset($admin) ? $admin->link_linkedin : old('linkedin')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Facebook
              </label>
              <input type="text" name="facebook" class="form-control" placeholder="Facebook"   value="<?php echo e(isset($admin) ? $admin->link_facebook : old('facebook')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
              Twitter
              </label>
              <input type="text" name="twitter" class="form-control" placeholder="Twitter"   value="<?php echo e(isset($admin) ? $admin->link_twitter : old('twitter')); ?>">
            </div>

            
          </fieldset>
          <div class="form-group col-md-6">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="reset" class="btn btn-primary">Limpar</button>
          </div>
        </form>    
      </div> 
  
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-admin.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>