<form wire:submit.prevent="salvar">
    <div class="card-body">

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="nome">*Nome</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['formaPagamento.nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           id="nome" wire:model.debounce.500ms="formaPagamento.nome">

                    <?php $__errorArgs = ['formaPagamento.nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?php echo e(route('gestor.forma_pagamentos.index')); ?>" class="btn btn-default">Voltar</a>
    </div>
</form>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/livewire/gestor/forma_pagamento.blade.php ENDPATH**/ ?>