<?php $__env->startSection('title', 'Formulário Forma de Pagamento - '); ?>
<?php $__env->startSection('header-title', 'Formulário Forma de Pagamento'); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('gestor.forma-pagamento', ['id' => $id])->html();
} elseif ($_instance->childHasBeenRendered('bRpxO49')) {
    $componentId = $_instance->getRenderedChildComponentId('bRpxO49');
    $componentTag = $_instance->getRenderedChildComponentTagName('bRpxO49');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bRpxO49');
} else {
    $response = \Livewire\Livewire::mount('gestor.forma-pagamento', ['id' => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('bRpxO49', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gestor.gestor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/gestor/forma_pagamentos/livewire.blade.php ENDPATH**/ ?>