<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <a href="<?php echo e(url('/empresa/vagas/cadastro')); ?>" class="btn btn-primary btn-add">Cadastrar Vaga</a><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Listagem de Vagas
            </div>
            <div class="panel-body">
                <?php if(!count($vagas) > 0): ?>
                    <div class="alert alert-warning">
                        Nenhuma vaga cadastrada.
                    </div>
                <?php else: ?>
                    <?php if(old('nome')): ?>
                        <div class="alert alert-success">
                            <strong>Sucesso!</strong> A vaga "<?php echo e(old('nome')); ?>" foi adicionada.
                        </div>
                    <?php endif; ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-vagas">
                        <thead>
                            <tr>
                                <th>Cargo</th>
                                <th>Nivel</th>
                                <th>Localidade</th>
                                <th>Salário</th>
                                <th>Quantidade</th>
                                <th>Data Expiração</th>
                                <th colspan="3">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $vagas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($vaga->nm_vaga); ?> </td>
                                    <td> <?php echo e($vaga->ds_nivel); ?></td>
                                    <td> <?php echo e($vaga->ds_localidade); ?> </td>
                                    <td> <?php echo e($vaga->qt_vagas); ?> </td>
                                    <td> <?php echo e($vaga->vl_salario_vaga); ?></td>
                                    <td> <?php echo e($vaga->dt_expiracao); ?> </td>
                                    <td alt="Detalhes">
                                        <a href="empresa/vagas/mostra/<?php echo e($vaga->cd_vaga); ?>"><span class="fa fa-eye" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a href="/empresa/vagas/editar/<?php echo e($vaga->cd_vaga); ?>" alt="Editar" class="teste"><span class="fa fa-edit" aria-hidden="true"></span></a>
                                    </td>
                                    <td class="excluir" >
                                        <a href="javascript:func" onclick="alertConfirmaExclusao('/empresa/vagas/remove/<?php echo e($vaga->cd_vaga); ?>')" alt="Excluir"><span class="fa fa-trash-o" aria-hidden="true" ></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
<?php echo $__env->make('area-empresa.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>