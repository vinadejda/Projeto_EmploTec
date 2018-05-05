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
        <form role="form" method="post" 
        action="<?php echo e(isset($vaga) ? '/painel/empresa/vagas/altera': '/painel/empresa/vagas/adiciona'); ?>">
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
              <label for="areaTI">
                <span class="text-danger">* </span> Área de TI
              </label>
              <select id="areaTI" name="areaTI" class="form-control" required="required">
                <option <?php echo e((isset($vaga) ? '' : 'selected="selected"')); ?>></option>
                <?php $__currentLoopData = $areasTI; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($a->cd_areaTI); ?>" <?php echo e((isset($vaga) && $a->cd_areaTI == $vaga->fk_area_ti) ? 'selected="selected"' : ''); ?>><?php echo e($a->nm_areaTI); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="quantidade">
                <span class="text-danger">* </span> Quantidade de Vagas
              </label>
              <input name="quantidade" type="number" min="0" max="100" class="form-control" placeholder="Quantidade de vagas" required="required" value="<?php echo e(isset($vaga) ? $vaga->qt_vagas : old('quantidade')); ?>">
            </div>

            <div class="form-group col-md-3">
              <label for="salario" >
                <span class="text-danger">* </span> Salário
              </label>
              <input type="text" name="salario" class="form-control" placeholder="Salario de vagas" required="required"  value="<?php echo e(isset($vaga) ? $vaga->vl_salario_vaga : old('salario')); ?>">
            </div>

            <div class="form-group col-md-3">
              <label for="nivel"><span class="text-danger">* </span> Nível</label>
                <select id="nivel" name="nivel"  class="form-control">
                    <option <?php echo e((isset($vaga) ? '' : 'selected="selected"')); ?>></option>
                    <option value="Estágio" <?php echo e((isset($vaga) && 'Estágio' == $vaga->ds_nivel) ? 'selected="selected"' : ''); ?>>Estágio</option>
                    <option value="Trainne" <?php echo e((isset($vaga) && 'Trainne' == $vaga->ds_nivel) ? 'selected="selected"' : ''); ?>>Trainne</option>
                </select>
            </div>
            <div class="form-group col-md-3">
              <label for="contratacao">Tipo de Contratação</label>
                <select id="contratacao" name="contratacao" class="form-control">
                    <option <?php echo e((isset($vaga) ? '' : 'selected="selected"')); ?>></option>
                    <option value="CLT" <?php echo e((isset($vaga) && 'CLT' == $vaga->nm_contratacao) ? 'selected="selected"' : ''); ?> >CLT</option>
                    <option value="PJ" <?php echo e((isset($vaga) && 'PJ' == $vaga->nm_contratacao) ? 'selected="selected"' : ''); ?> >PJ</option>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="cidade">
                <span class="text-danger">* </span> Cidade
              </label>
              <select id="cidade" name="cidade" class="form-control" required="required">
                <option <?php echo e((isset($vaga) ? '' : 'selected="selected"')); ?>></option>
                <?php $__currentLoopData = $cidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($c->cd_cidade); ?>" <?php echo e((isset($vaga) && $c->cd_cidade == $vaga->fk_cidade) ? 'selected="selected"' : ''); ?>><?php echo e($c->nm_cidade); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="dataExpiracao">
                <span class="text-danger">* </span> Data de Expiração
              </label>
              <input type="date" name="dataExpiracao" class="form-control" required="required" value="<?php echo e(isset($vaga) ? $vaga->dt_expiracao : old('dataExpiracao')); ?>">
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
          <div class="form-group col-md-8">
            <button type="submit" class="btn btn-success" >Salvar Dados</button>
            <?php if(!isset($vaga)): ?>
              <button type="reset" class="btn btn-primary">Limpar</button>
            <?php endif; ?>
          </div>
        </form>    
      </div> 
  
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-empresa.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>