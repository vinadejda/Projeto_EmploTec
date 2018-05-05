<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Administradores Cadastrados
            </div>
            <div class="panel-body">
                <?php if(!count($adm) > 0): ?>
                    <div class="alert alert-warning">
                        Nennhum administrador cadastrado.
                    </div>
                    <a href="<?php echo e(url('/painel/admin/cadastrarnovo')); ?>" class="btn btn-primary btn-add">Cadastrar Administrador</a>
                <?php else: ?>
                    <?php if(old('nome')): ?>
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> A vaga "<?php echo e(old('nome')); ?>" foi adicionada.
                        </div>
                    <?php endif; ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-vagas">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Telefone</th>
                                <th>Celular</th>
                                
                                <th colspan="2">Opções</th>
                            </tr>
                        </thead>


                                
                               
                        <tbody>
                            <?php $__currentLoopData = $adm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($a->name); ?> </td>
                                    <td> <?php echo e($a->email); ?></td>
                                    <td> R: <?php echo e($a->ds_rua); ?>, 
                                        N° <?php echo e($a->nr_endereco); ?>, 
                                        <?php echo e($a->ds_bairro); ?> 
                                        <?php echo e($a->ds_complemento != NULL ? " , Complemento:  $a->ds_complemento " :""); ?>

                               </td>
                                    <td> <?php echo e($a->nr_tel != NULL ? "Telefone: $a->nr_tel" :" ----"); ?></td>
                                    <td> <?php echo e($a->nr_cel != NULL ? "Celular:  $a->nr_cel " :"-----"); ?></td>
                                    
                                    <td alt="Detalhes">
                                        <a href="/painel/admin/mostra/<?php echo e($a->id); ?>"><span class="fa fa-eye" aria-hidden="true"></span></a>
                                    </td>
                                    
                                    <td class="excluir" >
                                        <a href="javascript:func" onclick="alertConfirmaExclusao('/painel/admin/remove/<?php echo e($a->id); ?>')" alt="Excluir"><span class="fa fa-trash-o" aria-hidden="true" ></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                     <a href="<?php echo e(url('/painel/admin/cadastrarnovo')); ?>" class="btn btn-primary btn-add">Cadastrar Administrador</a>
                    <script>
                        function alertConfirmaExclusao(link) {
                            var acao = confirm("Deseja realmente excluir este registro?")
                            if (acao){
                                window.location = link;
                            }
                        }
                    </script>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-admin.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>