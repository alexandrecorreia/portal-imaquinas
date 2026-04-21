@extends('admin.layouts.app')

@section('title', 'Lista de Páginas')

@section('content')
    <h1 class="mt-4 mb-4">Lista de Páginas</h1>

    <!-- Botão Voltar -->
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <div class="page-container">
        <!-- Formulário de busca -->
        <div class="mb-4">
            <form action="{{ route('admin.pages.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Buscar por título, slug ou equipamento..." value="{{ $search ?? '' }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Slug</th>
                            <th>Equipamento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pages as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>{{ $page->equipment }}</td>
                                <td>
                                    <a href="{{ url($page->slug) }}" class="btn btn-info btn-sm" target="_blank">Ver</a>
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta página?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Nenhuma página encontrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-4">
            <a href="{{ route('admin.pages.create') }}" class="btn btn-success">Criar Nova Página</a>
        </div>
    </div>
@endsection