<div class="tab-pane fade show active" id="outrasFormas" role="tabpanel" aria-labelledby="outrasFormas-tab">
    <div class="osahan-card-body pt-3">
        <form>
            <div class="form-row pt-3">
                <div class="col-md-12 form-group">
                    <select wire:model="pedido.forma_pagamento_id" class="custom-select form-control">
                        <option value="">Clique e escolha a forma de Pagamento</option>

                        <?php $__currentLoopData = $formasPagamento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formaPagamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($formaPagamento->id); ?>"><?php echo e($formaPagamento->nome); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/livewire/site/carrinho/pagamento/_outras_formas.blade.php ENDPATH**/ ?>