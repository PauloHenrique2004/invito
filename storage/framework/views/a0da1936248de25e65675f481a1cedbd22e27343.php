<?php $__env->startSection('title', ($tituloPagina ?? $categoria->nome) . ' - '); ?>

<?php $__env->startSection('content'); ?>
    <section class="py-4 osahan-main-body">
        <div class="container">
            <h1 class="h5 mb-4 titulo-paginas-internas ">
                <?php echo e($tituloPagina ?? $categoria->nome); ?>

            </h1>

            <?php if($produtos->count()): ?>
                <div class="row">
                    <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image produto">
                                    <a href="<?php echo e(route('produtos.show', [$produto->slug, $produto->id])); ?>"
                                       class="marrom-texto">
                                        <img alt="<?php echo e($produto->nome); ?>"
                                             src="<?php echo e(asset($produto->fotoUrl())); ?>"
                                             class="img-fluid item-img w-100 mb-3">

                                        <h6 class="produto-nome marrom-texto"><?php echo e($produto->nome); ?></h6>

                                        <h6 class="produto-valor" style="font-size:17px;font-weight:800;color:#697b2b;">
                                            <?php echo $__env->make('shared.produto._produto-preco', compact('produto'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-3">
                    <?php echo e($produtos->links()); ?>

                </div>
            <?php else: ?>
                <p>Não há produtos cadastrados nesta categoria.</p>
            <?php endif; ?>
        </div>
    </section>

    <style>
        /*.marrom-texto{ color: #697b2b; }*/
        .produto img { margin-bottom: 10px !important; }
        .produto h6 { font-weight: 400; font-size: 14px; margin-left: 7px;  color: #697b2b}
        .produto-nome { height: 33px; width: 93%; overflow: hidden !important; color: #697b2b }
        .produto-valor { color: #808080; }
        @media (max-width: 992px) {
            .osahan-main-body { margin-top: 5em !important; }
        }

        @media(min-width: 769px) {
            .produto img {
                margin-bottom: 10px !important;
                height: 400px;
                width: 220px;
                object-fit: cover;
            }

        }

        @media(max-width: 768px) {
            .produto img {
                margin-bottom: 10px !important;
                height: 290px;
                width: 220px;
                object-fit: cover;
            }

        }
    </style>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.site.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/site/categoria/show.blade.php ENDPATH**/ ?>