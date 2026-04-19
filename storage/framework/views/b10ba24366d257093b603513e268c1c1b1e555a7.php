<?php $__env->startSection('title', 'Formulário Horários - '); ?>
<?php $__env->startSection('header-title', 'Formulário Horário'); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('gestor.horario', ['id' => $id])->html();
} elseif ($_instance->childHasBeenRendered('NKEj3QK')) {
    $componentId = $_instance->getRenderedChildComponentId('NKEj3QK');
    $componentTag = $_instance->getRenderedChildComponentTagName('NKEj3QK');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('NKEj3QK');
} else {
    $response = \Livewire\Livewire::mount('gestor.horario', ['id' => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('NKEj3QK', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gestor.gestor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/gestor/horarios/livewire.blade.php ENDPATH**/ ?>