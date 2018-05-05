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
        action="<?php echo e(isset($perfil) ? '/painel/empresa/perfil/altera': '/painel/empresa/perfil/adiciona'); ?>">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <input type="hidden" input type="text" name="id" class="form-control" value="<?php echo e(isset($perfil) ? $perfil->cd_perfil_vaga : ''); ?>">

            <div class="form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Nome
              </label>
              <input type="text" name="nome" class="form-control" placeholder="Nome do perfil" required value="<?php echo e(isset($perfil) ? $perfil->nm_perfil_vaga : old('nome')); ?>">
            </div>

            <div class="form-group col-md-6">
              <label for="vaga">
                <span class="text-danger">* </span> Vaga
              </label>
              <select id="vaga" name="vaga" class="form-control" required>
              	<option <?php echo e((isset($perfil) ? '' : 'selected')); ?>></option>
                <?php $__currentLoopData = $vagas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($v->cd_vaga); ?>" <?php echo e((isset($perfil) && $v->cd_vaga == $id_vaga) ? 'selected' : ''); ?>><?php echo e($v->nm_vaga); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="genero">
                <span class="text-danger">*</span> Gênero
              </label><br>
              <label for="male">
              	<input type="radio" id="male" name="genero" value="Masculino" required
              <?php echo e((isset($perfil) && 'Masculino' == $perfil->ds_genero) ? 'checked' : ''); ?> > Masculino
          	</label>
			 <label for="female">
			  <input type="radio" id="female" name="genero" value="Feminino"
			  <?php echo e((isset($perfil) && 'Feminino' == $perfil->ds_genero) ? 'checked' : ''); ?>> Feminino
			  </label>
			  <label for="other">
			  <input type="radio" id="other" name="genero" value="Outros"
			  <?php echo e((isset($perfil) && 'Outros' == $perfil->ds_genero) ? 'checked' : ''); ?>> Outros
			  </label>
            </div>

            <div class="form-group col-md-3">
              <label for="idade">
                <span class="text-danger">*</span> Idade
              </label>
              <input type="number" name="idade" class="form-control" placeholder="Digite a idade desejada" required min="14" max="90" value="<?php echo e(isset($perfil) ? $perfil->nr_idade : old('idade')); ?>">
            </div>

            <div class="form-group col-md-5">
              <label for="formacao">
                <span class="text-danger">* </span> Formação
              </label>
              <input type="text" name="formacao" class="form-control" placeholder="Digite a formação desejada" required="required" value="<?php echo e(isset($perfil) ? $perfil->ds_formacao : old('formacao')); ?>">
              <!--<select id="formacao" name="areaTI" class="form-control" required="required">
                <option <?php echo e((isset($perfil) ? '' : 'selected="selected"')); ?>></option>
                <option value="Cursando curso técnico" <?php echo e((isset($perfil) && 'Cursando curso técnico' == $perfil->ds_formacao) ? 'selected="selected"' : ''); ?>>Estágio</option>
                <option value="Graduando" <?php echo e((isset($perfil) && 'Estágio' == $perfil->ds_formacao) ? 'selected="selected"' : ''); ?>>Estágio</option>
                <option value="Trainne" <?php echo e((isset($perfil) && 'Trainne' == $perfil->ds_formacao) ? 'selected="selected"' : ''); ?>>Trainne</option>
              </select>
          	-->
            </div>
            <div class="form-group col-md-12">
              <label for="competencia">Competências</label>
              <textarea name="competencia" class="form-control" placeholder="Digite as competências desejadas" rows="2" ><?php echo e(isset($perfil) ? $perfil->ds_interresse : old('competencia')); ?></textarea>
            </div>
          </fieldset>
          <div class="form-group col-md-8">
            <button type="submit" class="btn btn-success" >Salvar Dados</button>
            <?php if(!isset($perfil)): ?>
              <button type="reset" class="btn btn-primary">Limpar</button>
            <?php endif; ?>
          </div>
        </form>    
      </div> 
  
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-empresa.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>