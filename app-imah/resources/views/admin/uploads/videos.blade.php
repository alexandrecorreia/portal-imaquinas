@extends('admin.layouts.app')

@section('title', 'Gerenciar Vídeos')

@section('content')
    <h1 class="mt-4 mb-4">Gerenciar Vídeos</h1>

    <!-- Botão Voltar -->
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Voltar</a>
    </div>

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
                    <input type="text" class="form-control" id="descricao" name="descricao">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Buscar Vídeos</h5>
            <form action="{{ route('admin.videos') }}" method="GET">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="search" class="form-label">Buscar por descrição</label>
                        <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="date" class="form-label">Filtrar por data</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
                    </div>
                    <div class="col-md-2 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Vídeos Enviados</h5>
            @if (count($uploads) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Pré-visualização</th>
                            <th>Arquivo</th>
                            <th>Descrição</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($uploads as $upload)
                            <tr>
                                <td>
                                    <a href="{{ asset('storage/uploads/video/' . $upload['nome_arquivo']) }}" target="_blank">Ver vídeo</a>
                                </td>
                                <td onclick="shareLink('{{ $upload['nome_arquivo'] }}', )" style="cursor:pointer">
                                    <span style="color: #FF6200; font-size: 1rem; margin-right: 5px;">©</span> - {{ $upload['nome_arquivo'] }}
                                </td>                                
                                <td>{{ $upload['descricao'] }}</td>
                                <td>{{ \Carbon\Carbon::parse($upload['data_upload'])->format('d/m/Y') }}</td>
                                <td>
                                    <form action="{{ route('admin.upload.delete', ['tipo' => 'video', 'nomeArquivo' => $upload['nome_arquivo']]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmar exclusão?')">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Nenhum vídeo enviado.</p>
            @endif
        </div>
    </div>
    <script>
        // Share function
        function shareLink(url) {
            if (navigator.share) {
                navigator.share({
                    url: url
                }).then(() => {
                    console.log('Compartilhado com sucesso!');
                }).catch((error) => {
                    console.log('Erro ao compartilhar:', error);
                });
            } else {
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link copiado para a área de transferência!');
                }).catch((error) => {
                    console.log('Erro ao copiar o link:', error);
                    alert('Não foi possível copiar o link. Aqui está ele: ' + url);
                });
            }
        }

    </script>
@endsection