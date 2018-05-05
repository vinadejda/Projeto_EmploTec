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
    <h2>Experiencias Relevantes</h2>  

      <div class="card-body">
        <form role="form" method="post" action="<?php echo e(isset($exp) ? '/empresa/vagas/altera': '/painel/candidato/experiencia/adiciona'); ?>">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <input type="hidden" input type="text" name="id" class="form-control" value="<?php echo e(isset($exp) ? $exp->cd_experiencia : ''); ?>">

            <div class="form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Cargo
              </label>
              <input type="text" name="cargo" class="form-control" placeholder="Nome do Cargo Exercido" required="required" value="<?php echo e(isset($exp) ? $exp->nm_cargo_experiencia : old('cargo')); ?>">
            </div>

            <div class="form-group col-md-6">
              <label for="localidade">
                <span class="text-danger">* </span> Descrição
              </label>
              <input type="text" name="descricao" class="form-control" placeholder="Localidade da vaga" required="required" value="<?php echo e(isset($exp) ? $exp->ds_experiencia : old('descricao')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="quantidade">
                <span class="text-danger">* </span> Nome Empresa
              </label>
              <input name="empresa" type="text" min="0" max="100" class="form-control" placeholder="Quantidade de vagas" required="required" value="<?php echo e(isset($exp) ? $exp->nm_empresa : old('empresa')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
                <span class="text-danger">* </span> Segmento
              </label>
              <input type="text" name="segmento" class="form-control" placeholder="Salario de vagas" required="required"  value="<?php echo e(isset($exp) ? $exp->ds_segmento_empresa : old('segmento')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
                <span class="text-danger">* </span> Salário
              </label>
              <input type="number" name="salario" class="form-control" placeholder="Salario de vagas" required="required"  value="<?php echo e(isset($exp) ? $exp->vl_salario : old('salario')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> Data de Inicio
              </label>
              <input type="date" name="dataInicio" class="form-control" required="required" value="<?php echo e(isset($exp) ? $exp->dt_inicio_experiencia : old('dataInicio')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> Data de Termino
              </label>
              <input type="date" name="dataTermino" class="form-control" required="required" value="<?php echo e(isset($exp) ? $exp->dt_termino_experiencia : old('dataTermino')); ?>">
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