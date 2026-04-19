<!-- Menu bar -->
<div class="bg-color-head">
    <div class="container menu-bar d-flex align-items-center">
        <ul class="list-unstyled form-inline mb-0">
            <li class="nav-item">
                <a class="nav-link text-white pl-0" href="/">
                    Início <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white pl-0" href="/sobre-nos">Sobre nós</a>
            </li>

































            <?php $__currentLoopData = $menuCategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $temSub = $cat->subcategorias->count() > 0; ?>

                <li class="nav-item <?php echo e($temSub ? 'dropdown' : ''); ?>">
                    <?php if($temSub): ?>
                        <a class="nav-link text-white pl-0 dropdown-toggle"
                           href="<?php echo e(route('categoria', [$cat->slug, $cat->id])); ?>"
                           id="cat<?php echo e($cat->id); ?>Dropdown"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">
                            <?php echo e($cat->nome); ?>

                        </a>

                        <div class="dropdown-menu" aria-labelledby="cat<?php echo e($cat->id); ?>Dropdown">
                            <?php $__currentLoopData = $cat->subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item"
                                   href="<?php echo e(route('subcategoria', [\Str::slug($sub->produto_subcategoria), $sub->id])); ?>">
                                    <?php echo e($sub->produto_subcategoria); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <a class="nav-link text-white pl-0"
                           href="<?php echo e(route('categoria', [$cat->slug, $cat->id])); ?>">
                            <?php echo e($cat->nome); ?>

                        </a>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

        <div class="list-unstyled form-inline mb-0 ml-auto flex-nowrap">
            <a href="#contato" class="text-white px-3 py-2">
                Contato
            </a>
            <a href="<?php echo e(route('promocoes')); ?>" class="color-cinza-azulado bg-offer px-3 py-2 d-inline-flex align-items-center white-space-nowrap">
                <i class="icofont-sale-discount h6 mr-1"></i>
                Promoções
            </a>
        </div>

    </div>
</div>

<style>
    .flex-nowrap {
        flex-wrap: nowrap;
    }

    .white-space-nowrap {
        white-space: nowrap;
    }

</style>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/layouts/site/includes/menubar.blade.php ENDPATH**/ ?>