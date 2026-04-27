@extends('admin.layouts.app')

@section('title', 'Equipamentos')

@section('content')
    <h1 class="mt-4 mb-4">Equipamentos</h1>

    <!-- Botões alinhados: Novo à esquerda e Voltar no canto direito -->
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding:0px 3px;">
        <a href="{{ route('admin.equipaments.create') }}" class="btn btn-primary">
            + Novo Equipamento
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
                    @forelse($equipaments as $equipament)
                        <tr>
                            <td>{{ $equipament->name }}</td>
                            <td>{{ Str::limit($equipament->description, 80) }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.equipaments.edit', $equipament) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('admin.equipaments.destroy', $equipament) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Nenhum equipamento cadastrado ainda.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection