<?php $__env->startSection('title', 'Editar - Sobre Nós - '); ?>
<?php $__env->startSection('header-title', 'Editar - Sobre Nós'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Configurações da Página Sobre Nós</h3>
                </div>
                <?php echo $__env->make('gestor.sobre_nos._form', [
                    'action' => route('gestor.sobre-nos.update'),
                    'method' => 'PUT'
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('gestor.sobre-nos.imagens', ['sobreNosId' => $sobreNos->id])->html();
} elseif ($_instance->childHasBeenRendered('cy3vnqt')) {
    $componentId = $_instance->getRenderedChildComponentId('cy3vnqt');
    $componentTag = $_instance->getRenderedChildComponentTagName('cy3vnqt');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('cy3vnqt');
} else {
    $response = \Livewire\Livewire::mount('gestor.sobre-nos.imagens', ['sobreNosId' => $sobreNos->id]);
    $html = $response->html();
    $_instance->logRenderedChild('cy3vnqt', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('gestor.sobre-nos.integrantes', ['sobreNosId' => $sobreNos->id])->html();
} elseif ($_instance->childHasBeenRendered('OY3qZC3')) {
    $componentId = $_instance->getRenderedChildComponentId('OY3qZC3');
    $componentTag = $_instance->getRenderedChildComponentTagName('OY3qZC3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OY3qZC3');
} else {
    $response = \Livewire\Livewire::mount('gestor.sobre-nos.integrantes', ['sobreNosId' => $sobreNos->id]);
    $html = $response->html();
    $_instance->logRenderedChild('OY3qZC3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gestor.gestor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/gestor/sobre_nos/edit.blade.php ENDPATH**/ ?>