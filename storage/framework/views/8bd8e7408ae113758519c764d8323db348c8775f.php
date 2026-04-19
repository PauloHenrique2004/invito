<div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">
    <!-- address header -->
    <div class="card-header bg-white border-0 p-0" id="headingtwo">
        <h2 class="mb-0">
            <button type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true"
                    class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0"
                    aria-controls="collapsetwo"
                    wire:click="changeCard('formaEntrega')">
                <span class="c-number">2</span> Entrega

                <?php if(Auth::check()): ?>
                    <a href="" wire:click.prevent="editarEndereco()"
                       
                       class="text-decoration-none text-success ml-auto">
                        <i class="icofont-plus-circle mr-1"></i>Adicionar novo endereço</a>
                <?php endif; ?>
            </button>
        </h2>
    </div>
    <!-- body address -->
    <div id="collapsetwo" class="collapse show"
         aria-labelledby="headingtwo" data-parent="#accordionExample">
        <div class="card-body p-0 border-top">
            <div class="osahan-order_address">
                <div class="p-3 col-md-12 form-group">
                    <label for="formaEntrega">*Forma de Entrega</label>

                    <select wire:model="pedido.forma_entrega_id" id="formaEntrega"
                            class="form-control <?php $__errorArgs = ['municipioId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value=""></option>
                        <?php $__currentLoopData = $formasEntrega; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formaEntrega): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($formaEntrega->id); ?>">
                                <?php echo e($formaEntrega->nome); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <?php if($informarEndereco): ?>
                    <div class="p-3 row">
                        <?php if(sizeof($usuarioEnderecos) > 0): ?>
                            <?php $__currentLoopData = $usuarioEnderecos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $endereco): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('livewire.site.carrinho.forma_entrega._endereco', compact('pedido', 'endereco'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div style="color: var(--site-cor); margin: 0 auto; font-size: 14px; font-weight: bold">
                                Você nã possui nenhum endereço cadastrado.
                                <div style="text-align: center">
                                    <?php if(Auth::check()): ?>
                                        <a href="" wire:click.prevent="editarEndereco()"
                                           
                                           class="text-decoration-none text-success ml-auto">
                                            <i class="icofont-plus-circle mr-1"></i>Cadastrar endereço para entrega</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <style>
                        .endereco {
                            border: 1px solid #9a9a9a;
                            border-radius: 4px;
                        }

                        .endereco-selecionado {
                            /* border: 10px solid #225f39; */
                            border: 10px solid #abc49b;
                            border-radius: 12px;
                            box-shadow: 0 0 0 3px rgba(0, 230, 118, 0.35);
                        }
                    </style>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .endereco-box {
        border: 1px solid #c8d6c1;
        padding: 5px 0 9px 7px;
        border-radius: 10px;
        margin-top: 10px;
        margin-left: -13px;
        background: #fff;
        transition: border-color .15s ease, box-shadow .15s ease, transform .12s ease;
    }

    /* estado ao passar o mouse: já sugere clique */
    .endereco-box:hover {
        border-color: #7ed957;
    }

    /* endereço selecionado */
    .endereco-box.selecionado {
        border: 3px solid #00e676;          /* verde fluorescente mais grosso */
        box-shadow: 0 0 0 3px rgba(0, 230, 118, 0.25);
        background: #f6fff9;                /* leve fundo esverdeado */
        transform: translateY(-1px);        /* pequeno destaque visual */
    }

</style>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/livewire/site/carrinho/forma_entrega/_forma_entrega.blade.php ENDPATH**/ ?>