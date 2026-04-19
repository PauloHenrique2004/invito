<div class="m-3" style="display: flex">
    <div class="form-group" style="width: 100%; max-width: 245px">
        <label for="cupomDesconto" style="font-size: 16px; font-weight: bold">
            <i class="icofont-ticket" style="font-size: 30px"></i> Cupom de Desconto
        </label>

        <?php if($cupom): ?>
            <input type="text" class="form-control" id="cupomDesconto" value="<?php echo e($cupom->codigo); ?>" disabled>
        <?php else: ?>
            <input type="text" class="form-control" id="cupomDesconto" wire:model.debounce.100ms="cupomDescontoCodigo">
        <?php endif; ?>
    </div>

    <?php if($cupom): ?>
        <button wire:click="cupomDescontoRemover()" class="btn btn-success" type="button"
                style="height: 35px; margin-top: 33px; margin-left: 5px">
            <i class="icofont-trash"></i> Remover
        </button>
    <?php else: ?>
        <button wire:click="cupomDescontoAplicar()" class="btn btn-success" type="button"
                style="height: 35px; margin-top: 33px; margin-left: 5px">
            Aplicar
        </button>
    <?php endif; ?>
</div>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/livewire/site/carrinho/pagamento/_cupom_desconto.blade.php ENDPATH**/ ?>