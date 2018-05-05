<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
       
        <div class="panel panel-default">
            <div class="panel-heading">
               <h2> Suas Informações</h2>
            </div>
            <div class="panel-body">
                <?php if(!count($candidato) > 0): ?>
                    <div class="alert alert-warning">
                        Você ainda não terminou o seu cadastro :( <br>Melhor fazer isso o mais rápido possível
                    </div>
                    <a href="<?php echo e(url('/painel/candidato/dados/adiciona')); ?>" class="btn btn-primary btn-add">Continuar Cadastro</a><br>
                <?php else: ?>
                    <?php if(old('nome')): ?>
                        <div class="alert alert-success">
                            <strong>Nós desejamos  muito Sucesso para você!</strong>
                        </div>
                    <?php endif; ?>
                    
                            <?php $__currentLoopData = $candidato; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <label><strong> CPF: </strong><?php echo e($c->cd_cpf); ?> </label><br>
                                    <label><strong> Estado Civil: </strong> <?php echo e($c->ds_estado_civil); ?></label><br>
                                    <label><strong> Genero: </strong> <?php echo e($c->ic_genero); ?> </label><br>
                                    <label><strong> Data Nascimento: </strong> <?php echo e($c->dt_nascimento); ?> </label><br>
                                    <label><strong> Nacionalidade: </strong> <?php echo e($c->ds_nacionalidade); ?></label><br>
                                    <label><strong> Deficiencia: </strong> <?php echo e($c->fk_deficiencia == NULL ? "Não Consta" : $c->fk_deficiencia); ?> </label><br>
                                    <!--td alt="Detalhes">
                                        <a href="/painel/empresa/vagas/mostra/<?php echo e($c->cd_cpf); ?>"><span class="fa fa-eye" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a href="/painel/empresa/vagas/editar/<?php echo e($c->cd_cpf); ?>" alt="Editar" class="teste"><span class="fa fa-edit" aria-hidden="true"></span></a>
                                    </td>
                                    <td class="excluir" >
                                        <a href="javascript:func" onclick="alertConfirmaExclusao('/painel/empresa/vagas/remove/<?php echo e($c->cd_cpf); ?>')" alt="Excluir"><span class="fa fa-trash-o" aria-hidden="true" ></span></a>
                                    </td-->
                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <script>
                        function alertConfirmaExclusao(link) {
                            var acao = confirm("Deseja realmente excluir o seu cadastro?")
                            if (acao){
                                window.location = link;
                            }
                        }
                    </script>
                
            </div>
        </div>
         <a href="<?php echo e(url('/painel/candidato/dados/edita')); ?>" class="btn btn-primary btn-add">Atualizar Informações</a><br>
         <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('area-user.layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>