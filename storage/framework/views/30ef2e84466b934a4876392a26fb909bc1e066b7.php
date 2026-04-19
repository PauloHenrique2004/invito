<?php $__env->startSection('title', 'Formulário Gestor - '); ?>
<?php $__env->startSection('header-title', 'Formulário Gestor'); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('gestor.gestores.gestor', ['id' => $id])->html();
} elseif ($_instance->childHasBeenRendered('MeSyVvb')) {
    $componentId = $_instance->getRenderedChildComponentId('MeSyVvb');
    $componentTag = $_instance->getRenderedChildComponentTagName('MeSyVvb');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MeSyVvb');
} else {
    $response = \Livewire\Livewire::mount('gestor.gestores.gestor', ['id' => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('MeSyVvb', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gestor.gestor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/gestor/gestores/livewire.blade.php ENDPATH**/ ?>