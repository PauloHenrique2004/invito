<?php $__env->startSection('title', 'Cupom Descontos - '); ?>
<?php $__env->startSection('header-title', 'Cupom Descontos'); ?>

<?php $__env->startSection('card-tools'); ?>
    <a class="btn btn-primary content animate__animated animate__flipInX"
       href="<?php echo e(route('gestor.cupom_desconto')); ?>">
        <i class="fas fa-plus" aria-hidden="true"></i> Cadastrar
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Qtd de Uso Máxima</th>
                    <th>Qtd de Utilização</th>
                    <th>Validade</th>
                    <th>Valor</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $cupomDescontos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cupomDesconto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($cupomDesconto->codigo); ?></td>
                        <td><?php echo e($cupomDesconto->qtd_uso_maxima); ?></td>
                        <td><?php echo e($cupomDesconto->qtd_utilizado); ?></td>
                        <td><?php echo e($cupomDesconto->validade->format('d/m/Y')); ?></td>
                        <td>R$ <?php echo e(number_format($cupomDesconto->valor, 2, ',', '.')); ?></td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary"
                               href="<?php echo e(route('gestor.cupom_desconto', $cupomDesconto->id)); ?>">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('delete-form-<?php echo e($cupomDesconto->id); ?>').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="delete-form-<?php echo e($cupomDesconto->id); ?>"
                                  action="<?php echo e(route('gestor.cupom_descontos.destroy', $cupomDesconto->id)); ?>"
                                  method="POST"
                                  style="display: none;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                            </form>
                            <!-- / Remover -->

                        </td>
                        <!-- / Ações -->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer clearfix">
        <?php echo e($cupomDescontos->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gestor.gestor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/gestor/cupom_descontos/index.blade.php ENDPATH**/ ?>