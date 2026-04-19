<?php $__env->startSection('title', 'Formulário Produto - '); ?>

<form wire:submit.prevent="salvar" id="produto-form">
    <div class="card-header">
        <h1 class="card-title">Formulário Produto</h1>

        <div class="card-tools">
            <div class="float-right">
                <a class="btn btn-default"
                   href="<?php echo e(route('gestor.produto.produtos.index')); ?>">
                    <i class="nav-icon fas fa-book-open"></i>
                    Produtos
                </a>

                <a class="btn btn-danger <?php if(!$produto->id): ?> disabled <?php endif; ?>" style="color: #fff"
                   href="<?php echo e(route('gestor.produto.produto_grupos.index', $produto->id ? $produto->id : 0)); ?>">
                    <i class="nav-icon fas fa-align-left"></i>
                    Grupos
                </a>

                <button type="submit" class="btn btn-success">
                    <i class="nav-icon fas fa-save"></i> Salvar Produto
                </button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mb-4">
            
            <div class="col-md-6">
                <div style="margin: 0 auto; display: block; width: fit-content">
                    <label for="foto" style="width: 200px; margin: 0 auto; display: block;">
                        <img
                            style="width: 200px; height: 200px; cursor: pointer; object-fit: cover; border-radius: 10%;"
                            class="direct-chat-img"
                            src="<?php echo e(($foto && !$errors->has('foto')) ? $this->foto->temporaryUrl() : $produto->thumbnailUrl()); ?>"
                            alt="Foto do produto">
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
                            <i class="fas fa-info-circle"></i> Tamanho máximo 1MB (JPEG ou PNG)
                        </div>
                        <div style="text-align: center; border: 1px solid #fff;">
                            Resolução 640px x  640px
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
                </div>
            </div>

            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">*Nome</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['produto.nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nome"
                           wire:model.debounce.500ms="produto.nome">
                    <?php $__errorArgs = ['produto.nome'];
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

            






















            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="categoria">*Categoria</label>
                    <select class="custom-select <?php $__errorArgs = ['produto.produto_categoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="categoria" wire:model="produto.produto_categoria_id" required>
                        <option value="">Selecione</option>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($categoria->id); ?>">
                                <?php echo e($categoria->nome); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['produto.produto_categoria_id'];
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

            
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="subcategoria">Subcategoria do menu </label>
                    <select id="subcategoria"
                            class="custom-select <?php $__errorArgs = ['produto.produto_subcategoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            wire:model="produto.produto_subcategoria_id"
                            <?php if($subcategorias->isEmpty()): ?> disabled <?php endif; ?>>
                        <option value="">
                            <?php if($subcategorias->isEmpty()): ?>
                                — Esta categoria não possui subcategorias —
                            <?php else: ?>
                                — Selecione uma subcategoria —
                            <?php endif; ?>
                        </option>
                        <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($sub->id); ?>">
                                <?php echo e($sub->produto_subcategoria); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php $__errorArgs = ['produto.produto_subcategoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <small class="form-text text-muted">
                        Quando você escolhe uma subcategoria, o produto aparecerá na lista ao clicar nessa opção do menu.
                    </small>
                </div>
            </div>



            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="destaque_id">Seção de destaque na home</label>
                    <select id="destaque_id"
                            class="custom-select <?php $__errorArgs = ['produto.destaque_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            wire:model="produto.destaque_id">
                        <option value="">— Não destacar na home —</option>
                        <?php $__currentLoopData = $destaquesHome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destaque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($destaque->id); ?>"><?php echo e($destaque->nome); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['produto.destaque_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <small class="form-text text-muted">
                        Opcional. Escolha em qual seção de destaque da home este produto deve aparecer.
                    </small>
                </div>
            </div>

            
















            
            <div class="col-md-6">
                <div class="form-group">
                     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.jquery-mask-money','data' => ['wireModel' => 'produto.preco','id' => 'preco','label' => 'Preço Base','value' => ''.e($produto->preco).'']]); ?>
<?php $component->withName('jquery-mask-money'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire-model' => 'produto.preco','id' => 'preco','label' => 'Preço Base','value' => ''.e($produto->preco).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                    <div class="alert alert-info mt-2 mb-0" style="font-size: 14px;">
                        <strong>Quando usar:</strong> Para produtos com preço fixo.<br>
                        <strong>Itens opcionais:</strong>
                        <ol class="mb-0">
                            <li>Preencha o campo <strong>Preço Base</strong></li>
                            <li>Clique em <strong>Salvar produto</strong> → isso habilita a opção <strong>Grupos</strong></li>
                            <li>Clique no botão vermelho <strong>Grupos</strong></li>
                            <li>Cadastre os itens como <strong>OPCIONAIS</strong></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.jquery-mask-money','data' => ['wireModel' => 'produto.preco_a_partir_de','id' => 'preco_a_partir_de','label' => 'Preço a partir de','value' => ''.e($produto->preco_a_partir_de).'']]); ?>
<?php $component->withName('jquery-mask-money'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire-model' => 'produto.preco_a_partir_de','id' => 'preco_a_partir_de','label' => 'Preço a partir de','value' => ''.e($produto->preco_a_partir_de).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

                    <div class="alert alert-info mt-2 mb-0" style="font-size: 14px;">
                        <strong>Quando usar:</strong> Para produtos que têm variações de escolha <strong>OBRIGATÓRIA</strong> para o cliente.<br>
                        <strong>Adicionar itens obrigatórios:</strong>
                        <ol class="mb-0">
                            <li>Preencha o campo <strong>Preço a partir de</strong></li>
                            <li>Clique em <strong>Salvar produto</strong> → isso habilita a opção <strong>Grupos</strong></li>
                            <li>Clique no botão vermelho <strong>Grupos</strong></li>
                            <li>Cadastre os itens como <strong>OBRIGATÓRIOS</strong></li>
                        </ol>
                    </div>
                </div>
            </div>



            <div class="col-md-6">
                <div class="form-group d-flex">
                    <div class="form-check mr-3">
                        <input class="form-check-input"
                               type="radio"
                               name="promocional"
                               id="sim-promocional"
                               value="1"
                               wire:model="produto.promocional"
                        >
                        <label class="form-check-label" for="sim-promocional">Preço Promocional</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input"
                               type="radio"
                               name="promocional"
                               id="nao-promocional"
                               value="0"
                               wire:model="produto.promocional"
                        >
                        <label class="form-check-label" for="nao-promocional">Preço Normal</label>
                    </div>
                </div>

                <?php $__errorArgs = ['produto.promocional'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger small"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <?php if($produto->promocional): ?>
                <div class="col-md-6">
                    <div class="form-group">
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.jquery-mask-money','data' => ['wireModel' => 'produto.preco_promocional','id' => 'valor','label' => 'Preço Promocional','value' => ''.e($produto->preco_promocional).'']]); ?>
<?php $component->withName('jquery-mask-money'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire-model' => 'produto.preco_promocional','id' => 'valor','label' => 'Preço Promocional','value' => ''.e($produto->preco_promocional).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="col-sm-12">
                <label for="ativo">*Produto Ativo/Inativo</label>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ativo" required
                               id="ativo" value="1" wire:model="produto.ativo">
                        <label class="form-check-label" for="ativo">Ativo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ativo" required
                               id="inativo" value="0" wire:model="produto.ativo">
                        <label class="form-check-label" for="inativo">Inativo</label>
                    </div>
                </div>
            </div>

            
            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="descricao">Descrição</label>

                    
                    <textarea
                        type="text"
                        id="descricao"
                        class="form-control <?php $__errorArgs = ['produto.descricao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        wire:model.debounce.500ms="produto.descricao"
                        hidden
                    ></textarea>

                    
                    <div wire:ignore>
            <textarea
                rows="10"
                x-data
                x-ref="descricaoInput"
                x-init="
                    window.ckeditorDescricao = CKEDITOR.replace($refs.descricaoInput, {
                        customConfig: '/adminlte/ckeditor-plugins/plugins.js'
                    });
                    window.ckeditorDescricao.setData(window.livewire.find('<?php echo e($_instance->id); ?>').get('produto.descricao') ?? '');
                    window.ckeditorDescricao.on('change', function () {
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('produto.descricao', window.ckeditorDescricao.getData());
                    });
                "
                type="text"
            ><?php echo $produto->descricao; ?></textarea>
                    </div>

                    <?php $__errorArgs = ['produto.descricao'];
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































            
            <div class="col-md-12" style="margin-top: 25px;">
                <h5>Galeria de imagens</h5>

                <?php if($produto->id): ?>
                    
                    <?php $__currentLoopData = $galeria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="imagem-global" style="width: 100%; margin-top: 15px; margin-left: 8px;">
                            <div class="row">
                                <div class="col-md-10">
                                    <img style="height: 76px; border-radius: 10px; margin-bottom: 10px"
                                         src="<?php echo e(asset($img->imagem)); ?>">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button type="button"
                                            class="btn btn-danger btn-sm"
                                            wire:click="removerImagemGaleria(<?php echo e($img->id); ?>)">
                                        Remover
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php if($uploads): ?>
                        <div class="row mt-3">
                            <?php $__currentLoopData = $uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img src="<?php echo e($file->temporaryUrl()); ?>"
                                             class="card-img-top"
                                             style="height: 140px; object-fit: cover;">
                                        <div class="card-body p-2 text-center">
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-danger"
                                                    wire:click="removerUpload(<?php echo e($index); ?>)">
                                                Remover
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    
                    <div class="form-group mt-3">
                        <label>Selecionar novas imagens</label>
                        <input type="file" class="form-control"
                               multiple
                               wire:model="buffer">
                        <small class="form-text text-muted">
                            Escolha uma ou mais imagens e depois clique em "Adicionar à galeria".
                        </small>
                        <?php $__errorArgs = ['buffer.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger small"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <?php if($buffer): ?>
                        <div class="row mt-3">
                            <?php $__currentLoopData = $buffer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img src="<?php echo e($file->temporaryUrl()); ?>"
                                             class="card-img-top"
                                             style="height: 140px; object-fit: cover;">
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-2">
                            <button type="button" class="btn btn-info btn-sm"
                                    wire:click="confirmarBuffer">
                                Adicionar à galeria
                            </button>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="col-md-12" style="margin-top: 17px;">
                        <div class="alert alert-success" role="alert" style="text-align: center">
                            <h4 class="nav-icon fas fa">Alerta!</h4>
                            <p class="mb-0">Após salvar o formulário a opção de incluir imagens aparecerá.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>




        </div>
    </div>
</form>



   <?php $__env->startSection('script'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.querySelector('.btn-add-imagem');
            const input = document.getElementById('input-galeria');

            if (btn && input) {
                btn.addEventListener('click', function () {
                    input.click(); // abre o diálogo de arquivos
                });
            }
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php /**PATH /Users/fabtech/Documents/projects/acmbv/resources/views/livewire/gestor/produto/produto.blade.php ENDPATH**/ ?>