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
        <form role="form" method="post" action="<?php echo e(isset($vaga) ? '/empresa/vagas/altera': '/empresa/vagas/adiciona'); ?>">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <input type="hidden" input type="text" name="id" class="form-control" value="<?php echo e(isset($vaga) ? $vaga->cd_vaga : ''); ?>">

            <div class="form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Nome
              </label>
              <input type="text" name="nome" class="form-control" placeholder="Nome da vaga" required="required" value="<?php echo e(isset($vaga) ? $vaga->nm_vaga : old('nome')); ?>">
            </div>

            <div class="form-group col-md-6">
              <label for="localidade">
                <span class="text-danger">* </span> Localidade
              </label>
              <input type="text" name="localidade" class="form-control" placeholder="Localidade da vaga" required="required" value="<?php echo e(isset($vaga) ? $vaga->ds_localidade : old('localidade')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> Data de Expiração
              </label>
              <input type="date" name="dataExpiracao" class="form-control" required="required" value="<?php echo e(isset($vaga) ? $vaga->dt_expiracao : old('dataExpiracao')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="quantidade">
                <span class="text-danger">* </span> Quantidade
              </label>
              <input name="quantidade" type="number" min="0" max="100" class="form-control" placeholder="Quantidade de vagas" required="required" value="<?php echo e(isset($vaga) ? $vaga->qt_vagas : old('quantidade')); ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="salario" >
                <span class="text-danger">* </span> Salário
              </label>
              <input type="text" name="salario" class="form-control" placeholder="Salario de vagas" required="required"  value="<?php echo e(isset($vaga) ? $vaga->vl_salario_vaga : old('salario')); ?>">
            </div>

            <div class="form-group col-md-6">
              <label for="nivel"><span class="text-danger">* </span> Nível</label>
                <select id="nivel" name="nivel"  class="form-control">
                    <option value="estagiario">Estágio</option>
                    <option value="trainne">Trainne</option>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="contratacao">Contratação</label>
                <select id="contratacao" name="contratacao" class="form-control">
                    <option value="clt">CLT</option>
                    <option value="pj">PJ</option>
                </select>
            </div>
            <div class="form-group col-md-12">
              <label>Benefícios</label>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="valeTransporte" name="beneficio[]" 
                  <?php echo e(isset($vaga) && $vaga->ic_vale_transporte ? 'checked' : ''); ?>>Vale Transporte
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="valeAlimentacao" name="beneficio[]"
                  <?php echo e(isset($vaga) && $vaga->ic_vale_alimentacao ? 'checked' : ''); ?>>Vale Alimentação
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="planoSaude" name="beneficio[]"
                  <?php echo e(isset($vaga) && $vaga->ic_plano_saude ? 'checked' : ''); ?>>Plano de Saúde
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="planoDentario" name="beneficio[]"
                  <?php echo e(isset($vaga) && $vaga->ic_plano_dentario ? 'checked' : ''); ?>>Plano Dentário
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="planoVida" name="beneficio[]"
                  <?php echo e(isset($vaga) && $vaga->ic_seguro_vida ? 'checked' : ''); ?>>Plano de Vida
                </label>
              </div>
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
<?php echo $__env->make('area-empresa.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>