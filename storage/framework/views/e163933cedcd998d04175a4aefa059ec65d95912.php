<?php $__env->startSection('title', 'Formulário Página - '); ?>
<?php $__env->startSection('header-title', 'Formulário Página'); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pagina', ['id' => $id])->html();
} elseif ($_instance->childHasBeenRendered('SjhmGEN')) {
    $componentId = $_instance->getRenderedChildComponentId('SjhmGEN');
    $componentTag = $_instance->getRenderedChildComponentTagName('SjhmGEN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SjhmGEN');
} else {
    $response = \Livewire\Livewire::mount('pagina', ['id' => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('SjhmGEN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gestor.gestor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/gestor/paginas/livewire.blade.php ENDPATH**/ ?>