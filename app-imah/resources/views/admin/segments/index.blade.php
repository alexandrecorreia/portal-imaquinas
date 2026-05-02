@extends('admin.layouts.app')

@section('title', 'Segmentos')

@section('content')
    <h1 class="mt-4 mb-4">Segmentos</h1>

    <div class="d-flex justify-content-between align-items-center mb-3" style="padding: 0 3px;">
        <a href="{{ route('admin.segments.create') }}" class="btn btn-primary">
            + Novo Segmento
        </a>
        
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
            Voltar
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($segments as $segment)
                        <tr>
                            <td>{{ $segment->name }}</td>
                            <td>{{ Str::limit($segment->description, 80) }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.segments.edit', $segment) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('admin.segments.destroy', $segment) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Nenhum segmento cadastrado ainda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection