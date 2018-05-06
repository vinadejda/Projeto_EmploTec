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
  <div class="container-fluid caixa-areaTIs ">
  

      <div class="card-body">
        <form role="form" method="post" action="<?php echo e(isset($pergunta) ? '/painel/admin/testes/altera':'/painel/admin/testes/adiciona'); ?>">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
             <input type="hidden" input type="text" name="cd_pergunta" class="form-control" value="<?php echo e(isset($pergunta) ? $pergunta->cd_pergunta : ''); ?>">
            
            <h2> Questão</h2>
            <hr>
            
            <div class="form-group col-md-4">
              <label for="nome">
                <span class="text-danger">*</span> <b>Escolha uma Area</b>
              </label>
              <select name="areaTI" class="form-control" required>
                <option <?php echo e((isset($pergunta) ? '' : 'selected="selected"')); ?>></option>
                <?php $__currentLoopData = $areasTI; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aTI): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($aTI->cd_areaTI); ?>" <?php echo e((isset($pergunta) && $aTI->cd_areaTI == $pergunta->fk_areaTI) ? 'selected="selected"' : 'Selecione..'); ?>><?php echo e($aTI->nm_areaTI); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
              <div class="form-group">
              <label for="pergunta">
                <span class="text-danger">*</span> <b>Pergunta</b>
              </label>
              <textarea name="pergunta" class="form-control" id="pergunta" rows="3" placeholder="Escreva a sua pergunta" required>
                <?php echo e(isset($pergunta) ? $pergunta->ds_pergunta : old('pergunta')); ?> 
              </textarea>
              <input type="hidden"  name="cd_pergunta" class="form-control" value="<?php echo e(isset($pergunta) ? $pergunta->cd_pergunta : ''); ?>">
            </div>
          </div>

            <h2> Alternativas</h2>
            <hr>

            <i><span class="text-danger">Não se esqueça de MARCAR a ALTERNATIVA CERTA</span></i>
            <div class="form-row">
            <?php if(isset($alternativas)): ?> 

              <?php $__currentLoopData = $alternativas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
              <div class="form-group col-md-6">
                <label for="alternativaA">
                  <span class="text-danger">*</span> <b>Alternativa <?php echo e($i); ?>)</b>
                </label>
                <textarea name="alternativa<?php echo e($i); ?>" value="teste" class="form-control" id="alternativa<?php echo e($i); ?>" required><?php echo e((isset($a) && $a->fk_pergunta = $pergunta->cd_pergunta )? $a->ds_alternativa : old('alternativaA')); ?> </textarea>
                <input type="hidden" input type="text" name="cd_alternativa<?php echo e($i); ?>" class="form-control" value="<?php echo e(isset($a) ? $a->cd_alternativa : ''); ?>">
                <br>
            
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta<?php echo e($i); ?>" name="opcao" value="<?php echo e($i); ?>" class="custom-control-input" required <?php echo e((isset($a) && ($a->ic_alternativa == 1)) ? "checked" : ''); ?>>
                <label class="custom-control-label" for="opcaocerta<?php echo e($i++); ?>">Certa</label>
              </div>
 
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
            <div class="form-group col-md-6">
              <label for="alternativaA">
                <span class="text-danger">*</span> <b>Alternativa 1)</b>
              </label>
              <textarea name="alternativa0" value="teste" class="form-control" id="alternativa0" placeholder="Primeira Alternativa" required> </textarea>
              <br>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta0" name="opcao" class="custom-control-input" value="0" required>
                <label class="custom-control-label" for="opcaocerta0">Certa</label>
              </div>
            </div>
            <br>

            <div class="form-group col-md-6">
              <label for="alternativaB">
                <span class="text-danger">*</span> <b>Alternativa 2)</b>
              </label>
              <textarea name="alternativa1"  class="form-control" id="alternativa1"  placeholder="Segunda Alternativa" required></textarea>
              <br>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta1" name="opcao" value="1" class="custom-control-input" required>
                <label class="custom-control-label" for="opcaocerta1">Certa</label>
              </div>
            </div>
            <br>

            <div class="form-group col-md-6">
              <label for="alternativaC">
                <span class="text-danger">*</span> <b>Alternativa 3)</b>
              </label>
              <textarea name="alternativa2"  class="form-control" id="alternativa2" placeholder="Terceira Alternativa" required></textarea>
              <br>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta2" name="opcao" class="custom-control-input" value="2" required>
                <label class="custom-control-label" for="opcaocerta2">Certa</label>
              </div>
            </div>
            <br>

            <div class="form-group col-md-6">
              <label for="alternativaD">
                <span class="text-danger">*</span> <b>Alternativa 4)</b>
              </label>
              <textarea name="alternativa3"  class="form-control" id="alternativa3" placeholder="Quarta Alternativa" required></textarea>
              <br>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta3" name="opcao" class="custom-control-input" value="3" required>
                <label class="custom-control-label" for="opcaocerta3">Certa</label>
              </div>
            </div>
            <br>
            <div class="form-group col-md-6">
              <label for="alternativaE">
                <span class="text-danger">*</span> <b>Alternativa 5)</b>
              </label>
              <textarea name="alternativa4"  class="form-control" id="alternativa4" placeholder="Quinta Alternativa" required></textarea>
              <br>

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="opcaocerta4" name="opcao" class="custom-control-input" value="4" required>
                <label class="custom-control-label" for="opcaocerta4">Certa</label>
              </div>
            </div>
          </div>
          <?php endif; ?>
            <div class="form-group col-md-8">
            <button type="submit" class="btn btn-success" >Salvar Dados</button>
            <?php if(!isset($vaga)): ?>
              <button type="reset" class="btn btn-primary">Limpar</button>
            <?php endif; ?>
          </div>

        </fieldset>
      </form>
    </div>
  </div>
             

<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-admin.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>