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
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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
                                        <label class="form-check-label" for="segment_{{ $segment->id }}">
                                            {{ $segment->name }}
                                        </label>
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

                <!-- ====================== MÍDIA DA PÁGINA ====================== -->
                <div class="card mb-4 border-primary">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">📎 Mídia da Página</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Imagens <small>(múltiplas)</small></label>
                                <input type="file" id="upload_images" multiple accept="image/*" class="form-control">
                                <div id="images_preview" class="mt-2 d-flex flex-wrap gap-2"></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Vídeo <small>(único)</small></label>
                                <input type="file" id="upload_video" accept="video/*" class="form-control">
                                <div id="video_preview" class="mt-2"></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">PDF <small>(único)</small></label>
                                <input type="file" id="upload_pdf" accept=".pdf" class="form-control">
                                <div id="pdf_preview" class="mt-2"></div>
                            </div>
                        </div>

                        <button type="button" id="btn_insert_media" class="btn btn-success mt-3">
                            Inserir no Markdown
                        </button>
                    </div>
                </div>

                <!-- Conteúdo Markdown -->
                <div class="mb-3">
                    <label for="content" class="form-label">Conteúdo (Markdown)</label>
                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">
                        {{ old('content', $page->content) }}
                    </textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
    forceSync: true
});

let selectedImages = [];
let selectedVideo = '';
let selectedPdf = '';

$(document).ready(function() {

    function uploadFiles(files, tipo, callback) {
        const formData = new FormData();
        for (let file of files) {
            formData.append('arquivo', file);
            formData.append('tipo', tipo);
        }
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: '{{ route("admin.upload") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const nomes = response.generated_name ? [response.generated_name] : (response.nomes || []);
                callback(nomes);
            },
            error: function() {
                alert('Erro ao fazer upload');
            }
        });
    }

    // Uploads
    $('#upload_images').on('change', function() {
        uploadFiles(this.files, 'imagem', function(filenames) {
            selectedImages = selectedImages.concat(filenames);
            renderImagesPreview();
        });
    });

    $('#upload_video').on('change', function() {
        uploadFiles(this.files, 'video', function(filenames) {
            selectedVideo = filenames[0] || '';
            renderVideoPreview();
        });
    });

    $('#upload_pdf').on('change', function() {
        uploadFiles(this.files, 'pdf', function(filenames) {
            selectedPdf = filenames[0] || '';
            renderPdfPreview();
        });
    });

    // Render com botão de remover
    function renderImagesPreview() {
        $('#images_preview').empty();
        selectedImages.forEach((name, index) => {
            const badge = $(`
                <div class="badge bg-primary me-1 mb-1 d-inline-flex align-items-center">
                    ${name}
                    <span class="ms-2 remove-file" data-type="image" data-index="${index}" style="cursor:pointer; font-weight:bold;">×</span>
                </div>
            `);
            $('#images_preview').append(badge);
        });
    }

    function renderVideoPreview() {
        $('#video_preview').html(selectedVideo ? `
            <div class="badge bg-info d-inline-flex align-items-center">
                ${selectedVideo}
                <span class="ms-2 remove-file" data-type="video" style="cursor:pointer; font-weight:bold;">×</span>
            </div>` : '');
    }

    function renderPdfPreview() {
        $('#pdf_preview').html(selectedPdf ? `
            <div class="badge bg-danger d-inline-flex align-items-center">
                ${selectedPdf}
                <span class="ms-2 remove-file" data-type="pdf" style="cursor:pointer; font-weight:bold;">×</span>
            </div>` : '');
    }

    // Remover arquivo
    $(document).on('click', '.remove-file', function() {
        const type = $(this).data('type');
        const index = $(this).data('index');

        if (type === 'image') {
            selectedImages.splice(index, 1);
            renderImagesPreview();
        } else if (type === 'video') {
            selectedVideo = '';
            renderVideoPreview();
        } else if (type === 'pdf') {
            selectedPdf = '';
            renderPdfPreview();
        }
    });

    // Inserir no Markdown
    $('#btn_insert_media').on('click', function() {
        let content = easyMDE.value();

        // Função para atualizar ou adicionar linha
        function updateOrAddLine(tag, newFiles) {
            const regex = new RegExp(`\\[${tag}\\]:.*?(?=\\n|$)`, 'i');
            const match = content.match(regex);

            if (match) {
                // Já existe a linha → atualiza
                let existing = match[0].replace(`[${tag}]:`, '').trim();
                let allFiles = existing ? existing.split(',').map(f => f.trim()) : [];
                allFiles = [...new Set([...allFiles, ...newFiles])]; // remove duplicados
                content = content.replace(regex, `[${tag}]: ${allFiles.join(', ')}`);
            } else if (newFiles.length > 0) {
                // Não existe → adiciona no topo
                content = `[${tag}]: ${newFiles.join(', ')}\n` + content;
            }
        }

        if (selectedImages.length > 0) updateOrAddLine('images', selectedImages);
        if (selectedVideo) updateOrAddLine('video', [selectedVideo]);
        if (selectedPdf) updateOrAddLine('pdf', [selectedPdf]);

        easyMDE.value(content.trim());
        alert('Mídia atualizada com sucesso no Markdown!');
    });
});
</script>
@endsection