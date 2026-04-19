<?php $__env->startSection('title', 'Formulário Card - '); ?>
<?php $__env->startSection('header-title', 'Formulário Card'); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('gestor.slide', ['id' => $id])->html();
} elseif ($_instance->childHasBeenRendered('mldScYH')) {
    $componentId = $_instance->getRenderedChildComponentId('mldScYH');
    $componentTag = $_instance->getRenderedChildComponentTagName('mldScYH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('mldScYH');
} else {
    $response = \Livewire\Livewire::mount('gestor.slide', ['id' => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('mldScYH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gestor.gestor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/gestor/slides/livewire.blade.php ENDPATH**/ ?>