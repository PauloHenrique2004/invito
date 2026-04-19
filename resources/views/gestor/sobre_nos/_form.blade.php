<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="card-body">
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="titulo">Título Principal</label>
                <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $sobreNos->titulo) }}" required>
                @error('titulo')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-12 form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao_editor" class="form-control @error('descricao') is-invalid @enderror" rows="10">{{ old('descricao', $sobreNos->descricao) }}</textarea>
                @error('descricao')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-12 form-group">
                <label for="selo">Texto do selo</label>
                <div class="alert alert-info py-2" role="alert" style="margin-bottom:8px; font-size: 0.9rem;">
                    Se preenchido, um selo elegante aparecerá sobre o bloco visual da seção.
                </div>
                <input type="text" name="selo" id="selo" class="form-control @error('selo') is-invalid @enderror"
                    value="{{ old('selo', $sobreNos->selo) }}"
                    maxlength="60"
                    placeholder="Ex: 100% ARTESANAL">
                <small class="text-muted">Máximo de 60 caracteres.</small>
                @error('selo')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="col-md-4 form-group">
                <label for="missao">Missão</label>
                <textarea name="missao" class="form-control @error('missao') is-invalid @enderror" rows="4">{{ old('missao', $sobreNos->missao) }}</textarea>
                @error('missao')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label for="visao">Visão</label>
                <textarea name="visao" class="form-control @error('visao') is-invalid @enderror" rows="4">{{ old('visao', $sobreNos->visao) }}</textarea>
                @error('visao')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-4 form-group">
                <label for="valores">Valores</label>
                <textarea name="valores" class="form-control @error('valores') is-invalid @enderror" rows="4">{{ old('valores', $sobreNos->valores) }}</textarea>
                @error('valores')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
    </div>

    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>

@section('script')
<script>
    $(document).ready(function() {
        if (typeof CKEDITOR !== 'undefined') {
            CKEDITOR.replace('descricao_editor', {
                height: '250px',
                customConfig: '/adminlte/ckeditor-plugins/plugins.js'
            });
        }
    });
</script>
@endsection
