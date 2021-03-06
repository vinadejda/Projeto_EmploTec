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
  <div class="container-fluid caixa-experiencia ">
    <h2>Curriculo</h2>  

      <div class="card-body">
        <form role="form" method="post" action="<?php echo e(isset($curriculo) ? '/painel/candidato/curriculo/altera': '/painel/candidato/curriculo/salva'); ?>">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>

            <div class="form-group col-md-6">
              <label for="objetivo">
                <span class="text-danger">*</span> Objetivo Profssisional
              </label>
              <input type="text" name="objetivo" class="form-control" maxlength="50" placeholder="Digite o seu objetivo" required value="<?php echo e(isset($curriculo) ? $curriculo->ds_objetivo_profissional : old('objetivo')); ?>">
            </div>

            <div class="form-group col-md-6">
              <label for="vl_salario">
                Pretensão Salarial
              </label>
              <input type="number" name="vl_salario" class="form-control" min="1" max="9999999" placeholder="Digite sua pretensão salarial" value="<?php echo e(isset($curriculo) ? $curriculo->vl_prentencao_salarial : old('vl_salario')); ?>">
            </div>
            
            <div class="form-group col-md-6">
              <label for="resumo" >
                 Resumo Profissional
              </label>
              <textarea name="resumo" class="form-control" maxlength="250" placeholder="Digite seu resumo profissional"><?php echo e(isset($curriculo) ? $curriculo->ds_resumo_profissional : old('resumo')); ?></textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="informacoes">
                 Informações Complementares
              </label>
              <input name="informacoes" type="text" maxlength="40" class="form-control" placeholder="Digite as informações complementares" value="<?php echo e(isset($curriculo) ? $curriculo->ds_info_complementar : old('informacoes')); ?>">
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
<?php echo $__env->make('area-user.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>