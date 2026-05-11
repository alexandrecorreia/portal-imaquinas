@extends('admin.layouts.app')

@section('title', 'Gerenciar Imagens')

@section('content')
    <h1 class="mt-4 mb-4">Gerenciar Imagens</h1>

    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <!-- Upload -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Upload de Imagem</h5>
            <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tipo" value="imagem">
                <div class="mb-3">
                    <label for="arquivo" class="form-label">Selecionar Imagem (JPG, PNG)</label>
                    <input type="file" class="form-control" id="arquivo" name="arquivo" accept="image/jpeg,image/png" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" maxlength="300">
                </div>
                <button type="submit" class="btn btn-primary">Enviar Imagem</button>
            </form>
        </div>
    </div>

    <!-- Lista de Imagens -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Imagens Enviadas</h5>
            @if ($uploads->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Pré-visualização</th>
                            <th>Nome Original</th>
                            <th>Descrição</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($uploads as $upload)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $upload->path) }}" 
                                         alt="{{ $upload->original_name }}" 
                                         style="max-width: 100px; max-height: 100px; object-fit: cover;">
                                </td>
                                <td>{{ $upload->original_name }}</td>
                                <td>{{ $upload->description ?? '-' }}</td>
                                <td>{{ $upload->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('admin.upload.delete', ['tipo' => 'imagem', 'nomeArquivo' => $upload->generated_name]) }}" 
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Tem certeza que deseja excluir esta imagem?')">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">Nenhuma imagem enviada ainda.</p>
            @endif
        </div>
    </div>
@endsection