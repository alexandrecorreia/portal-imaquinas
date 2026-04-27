@extends('admin.layouts.app')

@section('title', 'Novo Equipamento')

@section('content')
    <h1 class="mt-4 mb-4">Novo Equipamento</h1>

    <a href="{{ route('admin.equipaments.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.equipaments.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nome do Equipamento</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Salvar Equipamento</button>
            </form>
        </div>
    </div>
@endsection