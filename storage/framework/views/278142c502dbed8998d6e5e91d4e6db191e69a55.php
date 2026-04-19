<div class="card card-outline card-success">
    <div class="card-header">
        <h3 class="card-title">Integrantes da associação</h3>
    </div>

    <div class="card-body">
        <div class="alert alert-info mb-4">
            Cadastre os integrantes exibidos na página "Sobre Nós". Informe foto, nome, cargo e ajuste a ordem de exibição quando necessário, dimensões recomendada: 400px x 480px
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="border rounded p-3 h-100">
                    <div class="form-group">
                        <label for="integrante-foto">Foto</label>
                        <input id="integrante-foto" type="file" class="form-control" wire:model="foto">
                        <small class="form-text text-muted">JPG, PNG ou WebP. Recomendado: foto quadrada.</small>
                    </div>

                    <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger small mb-2"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div class="form-group">
                        <label for="integrante-nome">Nome</label>
                        <input id="integrante-nome" type="text" class="form-control" wire:model.defer="nome">
                    </div>

                    <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger small mb-2"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div class="form-group">
                        <label for="integrante-cargo">Cargo</label>
                        <input id="integrante-cargo" type="text" class="form-control" wire:model.defer="cargo">
                    </div>

                    <?php $__errorArgs = ['cargo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger small mb-2"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div wire:loading wire:target="foto" class="text-muted small mb-3">
                        Processando foto...
                    </div>

                    <?php if($foto): ?>
                        <div class="border rounded overflow-hidden bg-light">
                            <img
                                src="<?php echo e($foto->temporaryUrl()); ?>"
                                alt="Pré-visualização do integrante"
                                style="width: 100%; height: 220px; object-fit: cover;"
                            >
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-8 mt-4 mt-lg-0">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Integrantes cadastrados</h5>

                    <?php if($integrantes->count() > 1): ?>
                        <button type="button" class="btn btn-sm btn-outline-success" wire:click="salvarOrdenacao">
                            Salvar ordenação
                        </button>
                    <?php endif; ?>
                </div>

                <?php if($integrantes->isEmpty()): ?>
                    <div class="alert alert-warning mb-0">
                        Nenhum integrante cadastrado ainda.
                    </div>
                <?php else: ?>
                    <?php $__currentLoopData = $integrantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $integrante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border rounded p-3 mb-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 mb-3 mb-md-0">
                                    <img
                                        src="<?php echo e($integrante->fotoUrl()); ?>"
                                        alt="<?php echo e($integrante->nome); ?>"
                                        style="width: 100%; height: 120px; object-fit: cover; border-radius: 14px;"
                                    >
                                </div>

                                <div class="col-md-4">
                                    <div class="font-weight-bold"><?php echo e($integrante->nome); ?></div>
                                    <div class="text-muted"><?php echo e($integrante->cargo); ?></div>
                                </div>

                                <div class="col-md-2 mt-3 mt-md-0">
                                    <label class="mb-1">Ordem</label>
                                    <input
                                        type="number"
                                        min="1"
                                        class="form-control"
                                        wire:model.defer="ordens.<?php echo e($integrante->id); ?>"
                                    >
                                </div>

                                <div class="col-md-3 text-md-right mt-3 mt-md-0">
                                    <button
                                        type="button"
                                        class="btn btn-outline-danger btn-sm"
                                        wire:click="removerIntegrante(<?php echo e($integrante->id); ?>)"
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
            Os integrantes serão exibidos na página pública conforme a ordem definida acima.
        </span>

        <button type="button" class="btn text-white" style="background: #e24e14;" wire:click="salvarIntegrante">
            Adicionar integrante
        </button>
    </div>
</div>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/livewire/gestor/sobre_nos/integrantes.blade.php ENDPATH**/ ?>