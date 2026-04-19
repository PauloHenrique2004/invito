<?php $__env->startSection('title', 'Páginas - '); ?>
<?php $__env->startSection('header-title', 'Páginas'); ?>







<?php $__env->startSection('content'); ?>
    <div class="card-body">

        <!----------------- Busca ----------------->
        <form class="mt-2 mb-4" accept-charset="UTF-8" method="get" action="<?php echo e(route('gestor.paginas.index')); ?>">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input name="titulo" placeholder="Pesquisa por título" class="form-control"
                           type="text" value="<?php echo e(request()->query('titulo')); ?>">

                    <select class="custom-select" name="categoria_id">
                        <option value="">Categoria</option>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <optgroup label="<?php echo e($categoria->nome); ?>">
                                <?php $__currentLoopData = $categoria->subCategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($subCategoria->id); ?>"
                                            <?php if(request()->query('categoria_id') == $subCategoria->id): ?> selected <?php endif; ?>>
                                        <?php echo e($subCategoria->nome); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </optgroup>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <div class="input-group-append">
                        <button class="btn btn-default ml-2 table-search"><i class="fa fa-search"></i></button>
                        <a class="btn btn-default ml-1" href="<?php echo e(route('gestor.paginas.index')); ?>">Limpar</a>
                    </div>
                </div>
            </div>
        </form>
        <!---------------- / Busca ---------------->

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th><i class="fas fa-calendar-alt"></i> Cadastro</th>
                    <th><i class="fas fa-calendar-alt"></i> Atualização</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $paginas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pagina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pagina->titulo); ?></td>
                        <td><?php echo e($pagina->categoria->nome); ?></td>
                        <td><?php echo e($pagina->created_at->format('d/m/Y H:i')); ?></td>
                        <td><?php echo e($pagina->updated_at->format('d/m/Y H:i')); ?></td>

                        <!-- Ações -->
                        <td>
                            <a class="btn btn-sm btn-primary" href="<?php echo e(route('gestor.pagina', $pagina->id)); ?>">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
                            </a>

                            <!-- Remover -->
                            <a data-confirm="Tem certeza?" class="btn btn-sm btn-danger" rel="nofollow"
                               data-method="delete"
                               href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form-<?php echo e($pagina->id); ?>').submit();">
                                <i class="fas fa-trash" aria-hidden="true"></i> Excluir
                            </a>

                            <form id="logout-form-<?php echo e($pagina->id); ?>"
                                  action="<?php echo e(route('gestor.paginas.destroy', $pagina->id)); ?>" method="POST"
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
        <?php echo e($paginas->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gestor.gestor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/gestor/paginas/index.blade.php ENDPATH**/ ?>