@extends('admin.layouts.app')

@section('title', 'Novo Segmento')

@section('content')
    <h1 class="mt-4 mb-4">Novo Segmento</h1>

    <a href="{{ route('admin.segments.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.segments.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nome do Segmento</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Salvar Segmento</button>
            </form>
        </div>
    </div>
@endsection