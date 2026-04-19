<div class="row">
    <div class="col-lg-8">
        <div class="accordion" id="accordionExample">
            <!-- Itens -->
            <?php echo $__env->make('livewire.site.carrinho.itens._itens', compact('currentCard', 'pedido', 'produtosSubTotal'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Endereço -->
            <?php echo $__env->make('livewire.site.carrinho.forma_entrega._forma_entrega', compact('currentCard', 'pedido', 'formasEntrega', 'usuarioEnderecos'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Pagamento -->
            <?php echo $__env->make('livewire.site.carrinho.pagamento._pagamento', compact('currentCard', 'formasPagamento', 'cupom', 'cupomDescontoCodigo', 'total'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <?php echo $__env->make('livewire.site.carrinho.total', compact('formaEntrega', 'usuarioEndereco', 'pedido', 'produtosSubTotal', 'quantidade', 'total'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</div>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.carrinho.pedido-whatsapp', [])->html();
} elseif ($_instance->childHasBeenRendered('mQOPIIt')) {
    $componentId = $_instance->getRenderedChildComponentId('mQOPIIt');
    $componentTag = $_instance->getRenderedChildComponentTagName('mQOPIIt');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('mQOPIIt');
} else {
    $response = \Livewire\Livewire::mount('site.carrinho.pedido-whatsapp', []);
    $html = $response->html();
    $_instance->logRenderedChild('mQOPIIt', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php echo $__env->make('livewire.site.carrinho.forma_entrega._nao_logado', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('script'); ?>
    <div wire:ignore>
        <script>
            $(document).ready(function () {
                const body = $('body')[0];

                body.addEventListener('usuario-nao-logado-alerta-visualizar', (e) => {
                    $('#usuarioNaoLogadoModal').modal('show');
                });

                body.addEventListener('pedido-whatsapp-visualizar', (e) => {
                    audio = new Audio('/pay_success.mp3');
                    audio.play();

                    $('#finalizarPedidoModal').modal('toggle');
                });
            });
        </script>
    </div>
<?php $__env->stopSection(); ?>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/livewire/site/carrinho/pedido.blade.php ENDPATH**/ ?>