<?php $__currentLoopData = $secoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloco): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($bloco['produtos']->isNotEmpty()): ?>
        <section class="mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 titulo-sessoes"><?php echo e($bloco['secao']->nome); ?></h4>
            </div>

            <div class="pick_today">
                <div class="row" style="justify-content: center">
                    <?php $__currentLoopData = $bloco['produtos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image produto">
                                    <a href="<?php echo e(route('produtos.show', [$produto->slug, $produto])); ?>"
                                       class="color-titulo-lista-produtos">
                                        <img alt="<?php echo e($produto->nome); ?>"
                                             src="<?php echo e(asset($produto->fotoUrl())); ?>"
                                             class="img-fluid item-img w-100 mb-3">

                                        <h6 class="produto-nome "><?php echo e($produto->nome); ?></h6>

                                        <h6 class="produto-valor" style="font-size: 17px;font-weight: 800; color: #697b2b;">
                                            <?php echo $__env->make('shared.produto._produto-preco', compact('produto'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<style>



    .produto h6 {
        font-weight: 400;
        font-size: 14px;
        margin-left: 7px;
    }

    .produto-nome {
        height: 33px;
        width: 93%;
        overflow: hidden !important;
    }


</style>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/site/home/_produtos.blade.php ENDPATH**/ ?>