<div class="card card-outline card-warning">
    <div class="card-header">
        <h3 class="card-title">Galeria da seção da home</h3>
    </div>

    <div class="card-body">
        <div class="alert alert-info mb-4">
            Envie múltiplas imagens para o carrossel da seção "Sobre nós" .
            Recomendação: fotos em JPG, PNG ou WebP com boa qualidade, dimensões recomendada: 1450px x 500px.
        </div>

        <div class="row">
            <div class="col-lg-5">
                <div class="border rounded p-3 h-100">
                    <div class="form-group">
                        <label for="novas-imagens">Selecionar imagens</label>
                        <input
                            id="novas-imagens"
                            type="file"
                            class="form-control"
                            multiple
                            wire:model="novasImagens"
                        >
                        <small class="form-text text-muted">
                            Você pode selecionar várias imagens de uma vez.
                        </small>
                    </div>

                    <?php $__errorArgs = ['novasImagens'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger small mb-2"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <?php $__errorArgs = ['novasImagens.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger small mb-2"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div wire:loading wire:target="novasImagens" class="text-muted small mb-3">
                        Processando imagens...
                    </div>

                    <?php if($novasImagens): ?>
                        <div class="row">
                            <?php $__currentLoopData = $novasImagens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arquivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-6 mb-3">
                                    <div class="border rounded overflow-hidden bg-light">
                                        <img
                                            src="<?php echo e($arquivo->temporaryUrl()); ?>"
                                            alt="Pré-visualização"
                                            style="width: 100%; height: 140px; object-fit: cover;"
                                        >
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="text-muted small">
                            As pré-visualizações aparecerão aqui após a seleção.
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-7 mt-4 mt-lg-0">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Imagens cadastradas</h5>

                    <?php if($imagens->count() > 1): ?>
                        <button type="button" class="btn btn-sm btn-outline-primary" wire:click="salvarOrdenacao">
                            Salvar ordenação
                        </button>
                    <?php endif; ?>
                </div>

                <?php if($imagens->isEmpty()): ?>
                    <div class="alert alert-warning mb-0">
                        Nenhuma imagem cadastrada ainda para o slider da home.
                    </div>
                <?php else: ?>
                    <?php $__currentLoopData = $imagens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border rounded p-3 mb-3">
                            <div class="row align-items-center">
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <img
                                        src="<?php echo e($imagem->imagemUrl()); ?>"
                                        alt="Imagem da seção Sobre nós"
                                        style="width: 100%; height: 140px; object-fit: cover; border-radius: 12px;"
                                    >
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label class="mb-1">Ordem</label>
                                        <input
                                            type="number"
                                            min="1"
                                            class="form-control"
                                            wire:model.defer="ordens.<?php echo e($imagem->id); ?>"
                                        >
                                    </div>
                                    <span class="badge badge-light border">Arquivo: <?php echo e($imagem->imagem); ?></span>
                                </div>

                                <div class="col-md-4 text-md-right mt-3 mt-md-0">
                                    <button
                                        type="button"
                                        class="btn btn-outline-danger btn-sm"
                                        wire:click="removerImagem(<?php echo e($imagem->id); ?>)"
                                    >
                                        Remover
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-between align-items-center flex-wrap">
        <span class="text-muted small mb-2 mb-md-0">
            A primeira imagem na ordem será exibida primeiro no carrossel.
        </span>

        <button type="button" class="btn btn-warning" wire:click="salvarImagens">
            Adicionar imagens
        </button>
    </div>
</div>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/livewire/gestor/sobre_nos/imagens.blade.php ENDPATH**/ ?>