<?php $__env->startSection('title', 'Formulário Produto Categoria - '); ?>
<?php $__env->startSection('header-title', 'Formulário Produto Categoria'); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('gestor.produto-categoria', ['id' => $id])->html();
} elseif ($_instance->childHasBeenRendered('Xy1TTuB')) {
    $componentId = $_instance->getRenderedChildComponentId('Xy1TTuB');
    $componentTag = $_instance->getRenderedChildComponentTagName('Xy1TTuB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Xy1TTuB');
} else {
    $response = \Livewire\Livewire::mount('gestor.produto-categoria', ['id' => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('Xy1TTuB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gestor.gestor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/gestor/produto_categorias/livewire.blade.php ENDPATH**/ ?>