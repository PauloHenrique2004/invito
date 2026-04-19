<?php $__env->startSection('title', 'Política de Privacidade'); ?>
<?php $__env->startSection('og:title', 'Política de Privacidade'); ?>
<?php $__env->startSection('description', 'Política de Privacidade'); ?>



<?php $__env->startSection('content'); ?>
    <section class="welcome-section section-padding">
        <div class="container">
            <div class="row align-items-center  justify-content-center">
               <h4 class="text-center mt-3">Política de Privacidade</h4>
               
            </div>
            <div class="text-center mb-4 pb-3">
                    Versão <?php echo e($lgpdTermo->id); ?>

            </div>
            <div class="section-title text-justify">
                <p>
                    <?php echo $lgpdTermo->texto; ?>

                </p>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/site/lgpd_termos/show.blade.php ENDPATH**/ ?>