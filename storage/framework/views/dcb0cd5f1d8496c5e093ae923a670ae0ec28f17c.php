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
    <h2>Informações do Candidato</h2>  

      <div class="card-body">
        <form role="form" method="post" action="<?php echo e(isset($candidato) ? '/painel/candidato/dados/altera': '/painel/candidato/dados/salva'); ?>">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            <input type="hidden" input type="text" name="cpf" class="form-control" value="<?php echo e(isset($candidato) ? $candidato->cd_cpf : ''); ?>">
            <input type="hidden" input type="text" name="id" class="form-control" value="<?php echo e(isset($candidato) ? $candidato->cd_experiencia : ''); ?>">
            
            <div class="form-group col-md-3">
              <label for="cpf">
                <span class="text-danger">*</span> CPF
              </label>
              <input type="text" name="cpf" pattern="[0-9]+$" title="CPF digitado de forma incorreta" maxlength="11" class="form-control" placeholder="Digite seu CPF" required value="<?php echo e(isset($candidato) ? $candidato->cd_cpf : old('cpf')); ?>" 
              <?php echo e(isset($candidato) ? 'readonly' : ''); ?>>
            </div>
            
            <div class="form-group col-md-3">
                <label for="estado_civil">
                    <span class="text-danger">* </span> Estado Civil
                 </label>
                <select name="estado_civil" required class="form-control">
                     <option <?php echo e((isset($candidato) ? '' : 'selected')); ?>></option>
                     <option value="Solteiro"
                     <?php echo e((isset($candidato) && 'Solteiro' == $candidato->ds_estado_civil) ? 'selected' : ''); ?>>Solteiro</option>
                     <option value="Casado"
                     <?php echo e((isset($candidato) && 'Casado' == $candidato->ds_estado_civil) ? 'selected' : ''); ?>>Casado</option>
                     <option value="Divorciado"
                     <?php echo e((isset($candidato) && 'Divorciado' == $candidato->ds_estado_civil) ? 'selected' : ''); ?>>Divorciado</option>
                     <option value="Viúvo"
                     <?php echo e((isset($candidato) && 'Viúvo' == $candidato->ds_estado_civil) ? 'selected' : ''); ?>>Viúvo</option>
                </select>
            </div>

            <div class="form-group col-md-3">
              <label for="dt_nascimento">
                <span class="text-danger">* </span> Data de nascimento
              </label>
              <input type="date" name="dt_nascimento" maxlength="10" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="01-01-1930" max="31-12-2018" class="form-control" required="required" value="<?php echo e(isset($candidato) ? $candidato->dt_nascimento : old('dt_nascimento')); ?>">
            </div>

            <div class="form-group col-md-3">
              <label for="nacionalidade" >
                Nacionalidade
              </label>
              <input type="text" name="nacionalidade" pattern="[A-Za-z\s]+$" title="Nacionalidade digitado em formato invalido." maxlength="20" class="form-control" placeholder="Digite sua nacionalidade" value="<?php echo e(isset($candidato) ? $candidato->ds_nacionalidade : old('nacionalidade')); ?>">
            </div>

            <div class="form-group col-md-3">
              <label for="genero">
                <span class="text-danger">* </span> Gênero<br>
              </label>
              <div class="form-check ">
              <input id="feminino" class="form-check-input" name="genero" type="radio"  required="required" value="Feminino" <?php echo e((isset($candidato) && 'Feminino' == $candidato->ic_genero) ? 'checked' : ''); ?>>
                <label for="feminino" class="form-check-label">
                  Feminino
                </label> 
                <br>
                <input id="masculino" name="genero" type="radio"  class="form-check-input"  required="required" value="Masculino" <?php echo e((isset($candidato) && 'Masculino' == $candidato->ic_genero) ? 'checked' : ''); ?>> 
                <label for="masculino" class="form-check-label">
                  Masculino
                </label>
                <br>
                <input id="outros" name="genero" type="radio"  class="form-check-input"  required="required" value="Outros" <?php echo e((isset($candidato) && 'Outros' == $candidato->ic_genero) ? 'checked' : ''); ?>> 
                 <label for="outros" class="form-check-label">
                  Outro
                </label>
              </div>
            </div>

            <div class="form-group col-md-3">
              <label for="deficiencia">
                Possui alguma deficiência?
              </label>
              
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="op" type="radio"  class="form-control"  required="required" value="Sim"> 
                 <label class="form-check-label">
                  Sim
                 </label>
                <input class="form-check-input" name="op" type="radio"  class="form-control"  required="required" value="Não"> 
                <label class="form-check-label">
                  Não
                </label>
              </div>
            
              <div class="form-check">
                <select id="deficiencia" name="deficiencia" class="form-control">

                 <option <?php echo e((isset($candidato) ? '' : 'selected')); ?>></option>
                  <?php $__currentLoopData = $deficiencia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  

                    <option value="<?php echo e((isset($d) && $d->cd_deficiencia == isset($candidato->fk_deficiencia)) ? '' : $d->cd_deficiencia); ?>"> <?php echo e($d->nm_deficiencia); ?> </option>
                    
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>  
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
<?php echo $__env->make('area-user.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>