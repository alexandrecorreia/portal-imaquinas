@extends('admin.layouts.app')

@section('title', 'Criar Página')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/easymde@2.18.0/dist/easymde.min.css" rel="stylesheet">
@endsection

@section('content')
    <h1 class="mt-4 mb-4">Criar Página</h1>

    <!-- Botão Voltar -->
    <div class="mb-3">
        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.pages.store') }}" method="POST" id="page-form">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required>
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="equipament_id" class="form-label">Equipamento</label>
                    <select name="equipament_id" id="equipament_id" class="form-control @error('equipament_id') is-invalid @enderror" required>
                        <option value="" disabled {{ old('equipament_id') ? '' : 'selected' }}>
                            Selecione um equipamento
                        </option>
                        @foreach($equipaments as $equipament)
                            <option value="{{ $equipament->id }}" 
                                    {{ old('equipament_id') == $equipament->id ? 'selected' : '' }}>
                                {{ $equipament->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('equipament_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>                
                <div class="mb-3">
                    <label for="content" class="form-label">Conteúdo (Markdown)</label>
                    <textarea name="content" id="content" class czujlass="form-control @error('content') is-invalid @enderror">{{ old('content', $defaultTemplate) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="button" class="btn btn-primary mb-3" onclick="preview()">Visualizar</button>
                <button type="submit" class="btn btn-primary mb-3">Salvar</button>
            </form>
        </div>
    </div>

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/easymde@2.18.0/dist/easymde.min.js"></script>
        <script>
            const easyMDE = new EasyMDE({
                element: document.getElementById('content'),
                forceSync: true
            });

            function preview() {
                const formData = new FormData();
                formData.append('title', document.getElementById('title').value);
                formData.append('slug', document.getElementById('slug').value);
                formData.append('content', easyMDE.value());
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

            document.getElementById('page-form').addEventListener('submit', function(event) {
                event.preventDefault();
                easyMDE.toTextArea();
                this.submit();
            });
        </script>
    @endsection
@endsection