@extends('admin.layouts.app')

@section('title', 'Editar Página')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/easymde@2.18.0/dist/easymde.min.css" rel="stylesheet">
@endsection

@section('content')
    <h1 class="mt-4 mb-4">Editar Página</h1>

    <div class="mb-3">
        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.pages.update', $page) }}" method="POST" id="page-form">
                @csrf
                @method('PUT')

                <!-- Título -->
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title', $page->title) }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Slug -->
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" 
                           value="{{ old('slug', $page->slug) }}" required>
                    @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Equipamento -->
                <div class="mb-3">
                    <label for="equipament_id" class="form-label">Equipamento</label>
                    <select name="equipament_id" id="equipament_id" class="form-control @error('equipament_id') is-invalid @enderror" required>
                        <option value="" disabled>Selecione um equipamento</option>
                        @foreach($equipaments as $equipament)
                            <option value="{{ $equipament->id }}" 
                                    {{ old('equipament_id', $page->equipament_id) == $equipament->id ? 'selected' : '' }}>
                                {{ $equipament->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Segmentos -->
                <div class="mb-4">
                    <label class="form-label">Segmentos</label>
                    <div class="border p-3 rounded bg-light" style="max-height: 300px; overflow-y: auto;">
                        <div class="row">
                            @foreach($segments as $segment)
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="segments[]" 
                                               id="segment_{{ $segment->id }}" value="{{ $segment->id }}" 
                                               {{ $page->segments->contains($segment->id) || in_array($segment->id, old('segments', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="segment_{{ $segment->id }}">{{ $segment->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Status e Condição -->
                <div class="row mb-4">
                    <div class="col-12">
                        <label class="form-label">Status e Condição do Equipamento</label>
                        <div class="border p-3 rounded bg-light">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label d-block">Status</label>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_active" value="1" 
                                                   {{ old('is_active', $page->is_active) == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label">Ativo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_active" value="0" 
                                                   {{ old('is_active', $page->is_active) == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label">Inativo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label d-block">Condição</label>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="condition" value="novo" 
                                                   {{ old('condition', $page->condition) == 'novo' ? 'checked' : '' }}>
                                            <label class="form-check-label">Novo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="condition" value="usado" 
                                                   {{ old('condition', $page->condition) == 'usado' ? 'checked' : '' }}>
                                            <label class="form-check-label">Usado</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Editor Markdown -->
                <div class="mb-3">
                    <label for="content" class="form-label">Conteúdo (Markdown)</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content', $page->content) }}</textarea>
                </div>

                <button type="button" class="btn btn-secondary mb-3" onclick="preview()">Visualizar</button>
                <button type="submit" class="btn btn-primary mb-3">Atualizar Página</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/easymde@2.18.0/dist/easymde.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
const easyMDE = new EasyMDE({
    element: document.getElementById('content'),
    forceSync: true,
    toolbar: [
        "bold", "italic", "heading", "strikethrough", "|",
        "quote", "unordered-list", "ordered-list", "|",
        "link", "|",
        {
            name: "upload-image",
            action: function() {
                const input = document.createElement('input');
                input.type = 'file';
                input.accept = 'image/*';
                input.multiple = true;
                
                input.onchange = function() {
                    if (!input.files.length) return;
                    const formData = new FormData();
                    for (let file of input.files) {
                        formData.append('arquivo', file);
                        formData.append('tipo', 'imagem');
                        formData.append('descricao', document.getElementById('slug').value || '');                        
                    }
                    formData.append('_token', '{{ csrf_token() }}');
                    

                    $.ajax({
                        url: '{{ route("admin.upload") }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.generated_name) {
                                easyMDE.codemirror.replaceSelection(`[IMAGEM] ${response.generated_name}\n\n`);
                            }
                        },
                        error: function() {
                            alert('Erro ao fazer upload da imagem');
                        }
                    });
                };
                input.click();
            },
            className: "fa fa-image",
            title: "Upload de Imagem"
        },
        {
            name: "upload-video",
            action: function() {
                const input = document.createElement('input');
                input.type = 'file';
                input.accept = 'video/*';
                
                input.onchange = function() {
                    const formData = new FormData();
                    formData.append('arquivo', input.files[0]);
                    formData.append('tipo', 'video');
                    formData.append('descricao', document.getElementById('slug').value || '');                    
                    formData.append('_token', '{{ csrf_token() }}');

                    $.ajax({
                        url: '{{ route("admin.upload") }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.generated_name) {
                                easyMDE.codemirror.replaceSelection(`[VIDEO] ${response.generated_name}\n\n`);
                            }
                        }
                    });
                };
                input.click();
            },
            className: "fa fa-video-camera",
            title: "Upload de Vídeo"
        },
        {
            name: "upload-pdf",
            action: function() {
                const input = document.createElement('input');
                input.type = 'file';
                input.accept = '.pdf';
                
                input.onchange = function() {
                    const formData = new FormData();
                    formData.append('arquivo', input.files[0]);
                    formData.append('tipo', 'pdf');
                    formData.append('descricao', document.getElementById('slug').value || '');                    
                    formData.append('_token', '{{ csrf_token() }}');

                    $.ajax({
                        url: '{{ route("admin.upload") }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.generated_name) {
                                easyMDE.codemirror.replaceSelection(`[PDF] ${response.generated_name}\n\n`);
                            }
                        }
                    });
                };
                input.click();
            },
            className: "fa fa-file-pdf-o",
            title: "Upload de PDF"
        },
        "|", "preview", "side-by-side", "fullscreen", "|", "guide"
    ]
});

function preview() {
    const formData = new FormData();
    formData.append('title', document.getElementById('title').value);
    formData.append('slug', document.getElementById('slug').value);
    formData.append('content', easyMDE.value());
    formData.append('equipament_id', document.getElementById('equipament_id').value);
    formData.append('is_active', document.querySelector('input[name="is_active"]:checked')?.value || '');
    formData.append('condition', document.querySelector('input[name="condition"]:checked')?.value || '');

    // Segmentos (checkboxes)
    document.querySelectorAll('input[name="segments[]"]:checked').forEach(cb => {
        formData.append('segments[]', cb.value);
    });

    formData.append('_token', '{{ csrf_token() }}');

    fetch('{{ route('admin.pages.preview') }}', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const newWindow = window.open('', '_blank');
        newWindow.document.write(data);
        newWindow.document.close();
    })
    .catch(error => console.error('Erro ao visualizar:', error));
}

document.getElementById('page-form').addEventListener('submit', function() {
    easyMDE.toTextArea();
});
</script>
@endsection