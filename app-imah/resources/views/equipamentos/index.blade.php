@extends('layouts.app')

@section('title', 'Equipamentos - Indústria de Máquinas IMAH')

@section('content')
    <section class="equipament-section">
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0">Equipamentos</h1>
                <!-- Botão pra alternar visualização -->
                <div>
                    <button class="btn btn-outline-primary view-toggle" data-view="card">
                        <i class="bi bi-grid"></i> Cartões
                    </button>
                    <button class="btn btn-outline-primary view-toggle" data-view="list">
                        <i class="bi bi-list-ul"></i> Lista
                    </button>
                </div>
            </div>

            @if ($categories->isEmpty())
                <p>Nenhuma categoria de equipamentos encontrada.</p>
            @else
                <!-- Abas de categorias -->
                <ul class="nav nav-tabs mb-4" id="equipmentTabs" role="tablist">
                    @foreach ($categories as $index => $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $index === 0 ? 'active' : '' }}" id="{{ strtolower(str_replace(['á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'ç'], ['a', 'e', 'i', 'o', 'u', 'a', 'o', 'c'], $category)) }}-tab" data-bs-toggle="tab" data-bs-target="#{{ strtolower(str_replace(['á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'ç'], ['a', 'e', 'i', 'o', 'u', 'a', 'o', 'c'], $category)) }}" type="button" role="tab" aria-controls="{{ strtolower(str_replace(['á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'ç'], ['a', 'e', 'i', 'o', 'u', 'a', 'o', 'c'], $category)) }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">{{ $category }}</button>
                        </li>
                    @endforeach
                </ul>

                <!-- Conteúdo das abas -->
                <div class="tab-content" id="equipmentTabsContent">
                    @foreach ($categories as $index => $category)
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="{{ strtolower(str_replace(['á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'ç'], ['a', 'e', 'i', 'o', 'u', 'a', 'o', 'c'], $category)) }}" role="tabpanel" aria-labelledby="{{ strtolower(str_replace(['á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'ç'], ['a', 'e', 'i', 'o', 'u', 'a', 'o', 'c'], $category)) }}-tab">
                            @if ($equipmentData[$category]->isEmpty())
                                <p>Nenhum equipamento encontrado para {{ $category }}.</p>
                            @else
                                <!-- Visualização em Cartões (padrão) -->
                                <div class="view-card" id="{{ strtolower(str_replace(['á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'ç'], ['a', 'e', 'i', 'o', 'u', 'a', 'o', 'c'], $category)) }}ListCard" style="display: block;">
                                    <div class="row">
                                        @foreach ($equipmentData[$category] as $page)
                                            <div class="col-md-4 mb-4">
                                                <div class="card equipment-card">
                                                    @if (!empty($page->images) && is_array($page->images) && count($page->images) > 0 && file_exists(storage_path('app/public/uploads/imagem/' . $page->images[0])))
                                                        <img src="{{ asset('storage/uploads/imagem/' . $page->images[0]) }}" class="card-img-top" alt="{{ $page->title }}">
                                                    @else
                                                        <img src="{{ asset('img/placeholder-image.jpg') }}" class="card-img-top" alt="Imagem não disponível">
                                                    @endif
                                                    <div class="card-body p-0">
                                                        <a href="{{ url('/' . $page->slug) }}" class="btn btn-primary d-block rounded-0" style="background-color: #00858D; border-color: #00858D;">{{ $page->title }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Visualização em Lista -->
                                <div class="view-list" id="{{ strtolower(str_replace(['á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'ç'], ['a', 'e', 'i', 'o', 'u', 'a', 'o', 'c'], $category)) }}ListList" style="display: none;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Título</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($equipmentData[$category] as $page)
                                                <tr>
                                                    <td class="item-title">{{ $page->title }}</td>
                                                    <td>
                                                        <a href="{{ url('/' . $page->slug) }}" class="btn btn-primary btn-sm">Ver Detalhes</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Alternar visualização
        document.querySelectorAll('.view-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const view = this.getAttribute('data-view');
                const activeTab = document.querySelector('.tab-pane.active').id;

                // Mostrar/esconder as visualizações
                document.querySelector(`#${activeTab}ListCard`).style.display = view === 'card' ? 'block' : 'none';
                document.querySelector(`#${activeTab}ListList`).style.display = view === 'list' ? 'block' : 'none';

                // Atualizar estado dos botões
                document.querySelectorAll('.view-toggle').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Limpando as mensagens (se houver)
        document.addEventListener('DOMContentLoaded', () => {
            const alerts = document.querySelectorAll('.alert-danger, .alert-error, .alert-success');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 3000);
            });

            // Ativar a aba com base no hash da URL
            const hash = window.location.hash.replace('#', '');
            if (hash) {
                const tab = document.querySelector(`#${hash}-tab`);
                if (tab) {
                    tab.click();
                }
            }

            // Definir visualização padrão como cartão
            document.querySelector('.view-toggle[data-view="card"]').classList.add('active');
        });
    </script>
@endsection