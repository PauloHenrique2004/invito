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

                    @error('foto')
                        <div class="text-danger small mb-2">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="integrante-nome">Nome</label>
                        <input id="integrante-nome" type="text" class="form-control" wire:model.defer="nome">
                    </div>

                    @error('nome')
                        <div class="text-danger small mb-2">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="integrante-cargo">Cargo</label>
                        <input id="integrante-cargo" type="text" class="form-control" wire:model.defer="cargo">
                    </div>

                    @error('cargo')
                        <div class="text-danger small mb-2">{{ $message }}</div>
                    @enderror

                    <div wire:loading wire:target="foto" class="text-muted small mb-3">
                        Processando foto...
                    </div>

                    @if($foto)
                        <div class="border rounded overflow-hidden bg-light">
                            <img
                                src="{{ $foto->temporaryUrl() }}"
                                alt="Pré-visualização do integrante"
                                style="width: 100%; height: 220px; object-fit: cover;"
                            >
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-8 mt-4 mt-lg-0">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Integrantes cadastrados</h5>

                    @if($integrantes->count() > 1)
                        <button type="button" class="btn btn-sm btn-outline-success" wire:click="salvarOrdenacao">
                            Salvar ordenação
                        </button>
                    @endif
                </div>

                @if($integrantes->isEmpty())
                    <div class="alert alert-warning mb-0">
                        Nenhum integrante cadastrado ainda.
                    </div>
                @else
                    @foreach($integrantes as $integrante)
                        <div class="border rounded p-3 mb-3">
                            <div class="row align-items-center">
                                <div class="col-md-3 mb-3 mb-md-0">
                                    <img
                                        src="{{ $integrante->fotoUrl() }}"
                                        alt="{{ $integrante->nome }}"
                                        style="width: 100%; height: 120px; object-fit: cover; border-radius: 14px;"
                                    >
                                </div>

                                <div class="col-md-4">
                                    <div class="font-weight-bold">{{ $integrante->nome }}</div>
                                    <div class="text-muted">{{ $integrante->cargo }}</div>
                                </div>

                                <div class="col-md-2 mt-3 mt-md-0">
                                    <label class="mb-1">Ordem</label>
                                    <input
                                        type="number"
                                        min="1"
                                        class="form-control"
                                        wire:model.defer="ordens.{{ $integrante->id }}"
                                    >
                                </div>

                                <div class="col-md-3 text-md-right mt-3 mt-md-0">
                                    <button
                                        type="button"
                                        class="btn btn-outline-danger btn-sm"
                                        wire:click="removerIntegrante({{ $integrante->id }})"
                                    >
                                        Remover
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
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
