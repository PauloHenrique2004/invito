<?php $__env->startSection('title', "Carrinho - "); ?>
<?php $__env->startSection('og:title', 'Carrinho'); ?>
<?php $__env->startSection('description', 'Carrinho'); ?>



<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.carrinho.pedido', [])->html();
} elseif ($_instance->childHasBeenRendered('z8PczdR')) {
    $componentId = $_instance->getRenderedChildComponentId('z8PczdR');
    $componentTag = $_instance->getRenderedChildComponentTagName('z8PczdR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('z8PczdR');
} else {
    $response = \Livewire\Livewire::mount('site.carrinho.pedido', []);
    $html = $response->html();
    $_instance->logRenderedChild('z8PczdR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/site/carrinho/livewire.blade.php ENDPATH**/ ?>