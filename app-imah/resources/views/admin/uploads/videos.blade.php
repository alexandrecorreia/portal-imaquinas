@extends('admin.layouts.app')

@section('title', 'Gerenciar Vídeos')

@section('content')
    <h1 class="mt-4 mb-4">Gerenciar Vídeos</h1>

    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <!-- Upload -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Upload de Vídeo</h5>
            <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tipo" value="video">
                <div class="mb-3">
                    <label for="arquivo" class="form-label">Selecionar Vídeo (MP4)</label>
                    <input type="file" class="form-control" id="arquivo" name="arquivo" accept="video/mp4" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" maxlength="300">
                </div>
                <button type="submit" class="btn btn-primary">Enviar Vídeo</button>
            </form>
        </div>
    </div>

    <!-- Lista -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vídeos Enviados</h5>
            @if ($uploads->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Arquivo</th>
                            <th>Descrição</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($uploads as $upload)
                            <tr>
                                <td>{{ $upload->original_name }}</td>
                                <td>{{ $upload->description ?? '-' }}</td>
                                <td>{{ $upload->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $upload->path) }}" target="_blank" class="btn btn-sm btn-info">Ver</a>
                                    <form action="{{ route('admin.upload.delete', ['tipo' => 'video', 'nomeArquivo' => $upload->generated_name]) }}" 
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Excluir este vídeo?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">Nenhum vídeo enviado ainda.</p>
            @endif
        </div>
    </div>
@endsection