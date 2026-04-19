<form wire:submit.prevent="save">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-12">
                <div style="margin: 0 auto; display: block; width: fit-content">
                    <!--- Foto --->
                    <label for="foto" style="width: 380px; margin: 0 auto; display: block;">
                        <img
                            style="width: 380px; height: 200px; cursor: pointer; object-fit: cover; border-radius: 10%;"
                            class="direct-chat-img"
                            src="<?php echo e(($foto && !$errors->has('foto')) ? $this->foto->temporaryUrl() : $slide->fotoUrl()); ?>"
                            alt="message user image">
                    </label>

                    <input type="file" id="foto" style="visibility: collapse"
                           class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           wire:model="foto">

                    <?php if (! ($errors->has('foto'))): ?>
                        <div style="text-align: center; border: 1px solid #fff;">
                            <i class="fas fa-info-circle"></i> Tamanho máximo 512KB (JPEG ou PNG)
                        </div>
                        <div style="text-align: center; border: 1px solid #fff;">
                            Resolução ideal 600px x 315px
                        </div>
                    <?php endif; ?>

                    <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div style="text-align: center; color: #a02525;">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <!-- / Foto -->
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <!--- Titulo --->
                <div class="form-group">
                    <label for="titulo">*Título</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="titulo"
                           wire:model.debounce.500ms="titulo">

                    <?php $__errorArgs = ['titulo'];
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
                <!-- / Titulo -->
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <!--- Ordem --->
                <div class="form-group">
                    <label for="ordem">Ordem</label>
                    <input type="number" class="form-control <?php $__errorArgs = ['ordem'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ordem"
                           wire:model.debounce.500ms="ordem">

                    <?php $__errorArgs = ['ordem'];
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
                <!-- / Ordem -->
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="promocional">*Promocional?</label>

                    <div class="ml-3 form-check-inline">
                        <input class="form-check-input" type="radio" name="promocional" id="promocional" value="1"
                               wire:model.debounce.500ms="promocional" required>
                        <label class="form-check-label" for="promocional">Sim</label>

                        <input class="form-check-input ml-2" type="radio" name="promocional" id="nao-promocional" value="0"
                               wire:model.debounce.500ms="promocional" required>
                        <label class="form-check-label" for="nao-promocional">Não</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <!--- Link --->
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="link" required
                           wire:model.debounce.500ms="link">

                    <?php $__errorArgs = ['link'];
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
                <!-- / Link -->
            </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="<?php echo e(route('gestor.slides.index')); ?>" class="btn btn-default">Voltar</a>
    </div>
</form>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/livewire/gestor/slide.blade.php ENDPATH**/ ?>