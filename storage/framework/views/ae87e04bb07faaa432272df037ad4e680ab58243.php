<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Lista de Teste Existentes</h2>
                <hr>
            </div>
            <div class="panel-body">
                <a href="<?php echo e(url('/painel/admin/testes/cadastra')); ?>" class="btn btn-primary btn-add">Cadastrar Novo Teste</a>
            <br><br>
                
            <?php $__currentLoopData = $pergunta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!isset($p)): ?>
                    <div class="alert alert-warning">
                        Nenhum teste cadastrado.
                    </div>
                    <?php else: ?>
                    <article class="card col-lg-12" >  
                      <div class="card-body">
                        
                                <h3 class="card-title">Questão: </h3>
                                <?php $__currentLoopData = $areasTI; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aTI): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($p->fk_areaTI == $aTI->cd_areaTI): ?>
                                        <p class="card-text"><b>Área: </b><?php echo e($aTI->nm_areaTI); ?></p>
                                    <?php endif; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <p class="card-text"><?php echo e($p->ds_pergunta); ?></p>
                              </div>
                              <?php $__currentLoopData = $alternativas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($a->fk_pergunta == $p->cd_pergunta): ?>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i class="<?php echo e(($a->ic_alternativa == 1) ? 'fa fa-check' : 'fa fa-times'); ?>" aria-hidden="true"></i>
                                             <?php echo e($a->ds_alternativa); ?> </li>
                                         </ul>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="card-body">
                                <a href="/painel/admin/testes/editar/<?php echo e($p->cd_pergunta); ?>" class="card-link col-lg-4" alt="Editar">
                                    <span class="fa fa-edit" aria-hidden="true"></span>
                                    Alterar Questão
                                </a>
                                <a href="javascript:func" onclick="alertConfirmaExclusao('/painel/admin/testes/remove/<?php echo e($p->cd_pergunta); ?>')" alt="Excluir" class="card-link col-lg-4">
                                    <span class="fa fa-trash-o" aria-hidden="true" ></span>
                                    Excluir Questão
                                </a>
                            </div>
                             
                      </div>
                    </article>
                    <br>
                         <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                

                    <script>
                        function alertConfirmaExclusao(link) {
                            var acao = confirm("Deseja realmente excluir este registro?")
                            if (acao){
                                window.location = link;
                            }
                        }
                    </script>
                
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-admin.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>