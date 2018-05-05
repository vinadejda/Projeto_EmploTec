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
        <form role="form" method="post" action="<?php echo e('/empresa/areaTIs/adiciona'); ?>">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
            
            <h2> Questão</h2>
            <hr>
            <div class="form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Area
              </label>
              <select name="alternativa">
                <option value="<?php echo e($areasTI->cd_areaTI); ?>"><?php echo e($areasTI->nm_areaTI); ?></option>
                
              </select>
             

<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-admin.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>