<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <a href="<?php echo e(url('/painel/empresa/vagas/perfil/cadastro')); ?>" class="btn btn-primary btn-add">Cadastrar Perfil</a><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Listagem de Perfis de Vagas
            </div>
            <div class="panel-body">
                <?php if(!count($perfis) > 0): ?>
                    <div class="alert alert-warning">
                        Nenhum perfil cadastrado.
                    </div>
                <?php else: ?>
                    <?php if(old('nome')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <strong>Sucesso!</strong> O Perfil "<?php echo e(old('nome')); ?>" foi adicionado.
                        </div>
                    <?php endif; ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-vagas">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Gênero</th>
                                <th>Idade</th>
                                <th>Formação</th>
                                <th>Competências</th>
                                <th>Vaga</th>
                                <th colspan="2">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $perfis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perfil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($perfil->nm_perfil_vaga); ?></td>
                                    <td> <?php echo e($perfil->ds_genero); ?> </td>
                                    <td> <?php echo e($perfil->nr_idade); ?></td>
                                    <td> <?php echo e($perfil->ds_formacao); ?> </td>
                                    <td> <?php echo e($perfil->ds_interresse); ?> </td>
                                    <td> <?php echo e($perfil->nm_vaga); ?> </td>
                                    <!--
                                    <td alt="Detalhes">
                                        <a href="/painel/empresa/perfil/mostra/<?php echo e($perfil->cd_perfil_vaga); ?>">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                	-->
                                    <td>
                                        <a href="/painel/empresa/perfil/editar/<?php echo e($perfil->cd_perfil_vaga); ?>" alt="Editar" class="teste">
                                            <span class="fa fa-edit" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                    <td class="excluir" >
                                        <a href="javascript:func" onclick="alertConfirmaExclusao('/painel/empresa/perfil/remove/<?php echo e($perfil->cd_perfil_vaga); ?>')" alt="Excluir">
                                            <span class="fa fa-trash-o" aria-hidden="true" ></span>
                                        </a>
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