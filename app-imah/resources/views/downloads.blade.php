@extends('layouts.app')

@section('title', 'Downloads - Indústria de Máquinas IMAH')

@section('content')
    <section class="downloads-section" style="padding-top: 2rem; padding-bottom: 2rem;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0">Downloads</h1>
                <!-- Botão pra alternar visualização -->
                <div>
                    <button class="btn btn-outline-primary view-toggle" data-view="list">
                        <i class="bi bi-list-ul"></i> Lista
                    </button>
                    <button class="btn btn-outline-primary view-toggle" data-view="card">
                        <i class="bi bi-grid"></i> Cartões
                    </button>
                </div>
            </div>

            <!-- Campo de Busca -->
            <div class="mb-4">
                <input type="text" class="form-control" id="searchInput" placeholder="Buscar arquivos..." />
            </div>

            <!-- Abas -->
            <ul class="nav nav-tabs" id="downloadTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="images-tab" data-bs-toggle="tab" data-bs-target="#images" type="button" role="tab" aria-controls="images" aria-selected="true">Imagens</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="false">Vídeos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pdfs-tab" data-bs-toggle="tab" data-bs-target="#pdfs" type="button" role="tab" aria-controls="pdfs" aria-selected="false">PDFs</button>
                </li>
            </ul>

            <!-- Conteúdo das Abas -->
            <div class="tab-content" id="downloadTabsContent">
                <!-- Imagens -->
                <div class="tab-pane fade show active" id="images" role="tabpanel" aria-labelledby="images-tab">
                    <!-- Visualização em Lista (padrão) -->
                    <div class="view-list" id="imagesListList" style="display: block;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($images as $image)
                                    <tr>
                                        <td class="item-name">{{ $image['name'] }}</td>
                                        <td>Imagem</td>
                                        <td>
                                            <a href="{{ asset($image['path']) }}" class="btn btn-primary btn-sm me-2" download>Baixar</a>
                                            <button class="btn btn-outline-secondary btn-sm share-btn" data-link="{{ asset($image['path']) }}">
                                                <i class="bi bi-share-fill"></i> Compartilhar
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Nenhuma imagem disponível.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Visualização em Cartões -->
                    <div class="view-card" id="imagesListCard" style="display: none;">
                        <div class="row">
                            @forelse ($images as $image)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title item-name">{{ $image['name'] }}</h5>
                                            <a href="{{ asset($image['path']) }}" class="btn btn-primary btn-sm me-2" download>Baixar</a>
                                            <button class="btn btn-outline-secondary btn-sm share-btn" data-link="{{ asset($image['path']) }}">
                                                <i class="bi bi-share-fill"></i> Compartilhar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 mt-3">
                                    <p>Nenhuma imagem disponível.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- Vídeos -->
                <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                    <!-- Visualização em Lista (padrão) -->
                    <div class="view-list" id="videosListList" style="display: block;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($videos as $video)
                                    <tr>
                                        <td class="item-name">{{ $video['name'] }}</td>
                                        <td>Vídeo</td>
                                        <td>
                                            <a href="{{ asset($video['path']) }}" class="btn btn-primary btn-sm me-2" download>Baixar</a>
                                            <button class="btn btn-outline-secondary btn-sm share-btn" data-link="{{ asset($video['path']) }}">
                                                <i class="bi bi-share-fill"></i> Compartilhar
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Nenhum vídeo disponível.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Visualização em Cartões -->
                    <div class="view-card" id="videosListCard" style="display: none;">
                        <div class="row">
                            @forelse ($videos as $video)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title item-name">{{ $video['name'] }}</h5>
                                            <a href="{{ asset($video['path']) }}" class="btn btn-primary btn-sm me-2" download>Baixar</a>
                                            <button class="btn btn-outline-secondary btn-sm share-btn" data-link="{{ asset($video['path']) }}">
                                                <i class="bi bi-share-fill"></i> Compartilhar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 mt-3">
                                    <p>Nenhum vídeo disponível.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- PDFs -->
                <div class="tab-pane fade" id="pdfs" role="tabpanel" aria-labelledby="pdfs-tab">
                    <!-- Visualização em Lista (padrão) -->
                    <div class="view-list" id="pdfsListList" style="display: block;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pdfs as $pdf)
                                    <tr>
                                        <td class="item-name">{{ $pdf['name'] }}</td>
                                        <td>PDF</td>
                                        <td>
                                            <a href="{{ asset($pdf['path']) }}" class="btn btn-primary btn-sm me-2" download>Baixar</a>
                                            <button class="btn btn-outline-secondary btn-sm share-btn" data-link="{{ asset($pdf['path']) }}">
                                                <i class="bi bi-share-fill"></i> Compartilhar
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Nenhum PDF disponível.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Visualização em Cartões -->
                    <div class="view-card" id="pdfsListCard" style="display: none;">
                        <div class="row">
                            @forelse ($pdfs as $pdf)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title item-name">{{ $pdf['name'] }}</h5>
                                            <a href="{{ asset($pdf['path']) }}" class="btn btn-primary btn-sm me-2" download>Baixar</a>
                                            <button class="btn btn-outline-secondary btn-sm share-btn" data-link="{{ asset($pdf['path']) }}">
                                                <i class="bi bi-share-fill"></i> Compartilhar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 mt-3">
                                    <p>Nenhum PDF disponível.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Alternar visualização
        document.querySelectorAll('.view-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const view = this.getAttribute('data-view');
                const activeTab = document.querySelector('.tab-pane.active').id; // Pega a aba ativa (images, videos, pdfs)
                
                // Mostrar/esconder as visualizações
                document.querySelector(`#${activeTab}ListList`).style.display = view === 'list' ? 'block' : 'none';
                document.querySelector(`#${activeTab}ListCard`).style.display = view === 'card' ? 'block' : 'none';

                // Atualizar estado dos botões
                document.querySelectorAll('.view-toggle').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Busca dinâmica (atualizada pra funcionar nas duas visualizações)
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const search = e.target.value.toLowerCase();
            const lists = ['images', 'videos', 'pdfs'];
            lists.forEach(tab => {
                // Busca na visualização de lista
                const listItems = document.querySelectorAll(`#${tab}ListList .item-name`);
                listItems.forEach(item => {
                    const title = item.textContent.toLowerCase();
                    item.closest('tr').style.display = title.includes(search) ? '' : 'none';
                });
                // Busca na visualização de cartões
                const cardItems = document.querySelectorAll(`#${tab}ListCard .item-name`);
                cardItems.forEach(item => {
                    const title = item.textContent.toLowerCase();
                    item.closest('.col-md-4').style.display = title.includes(search) ? '' : 'none';
                });
            });
        });

        // Compartilhar link
        document.querySelectorAll('.share-btn').forEach(button => {
            button.addEventListener('click', async function() {
                const link = this.getAttribute('data-link');
                try {
                    await navigator.clipboard.writeText(link);
                    alert('Link copiado para a área de transferência!');
                } catch (err) {
                    console.error('Erro ao copiar:', err);
                    alert('Erro ao copiar o link. Tente novamente.');
                }
            });
        });

        // Garantir que a visualização padrão (lista) seja refletida nos botões ao carregar
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('.view-toggle[data-view="list"]').classList.add('active');
        });
    </script>
@endsection