@extends('admin.layouts.app')

@section('title', 'Editar Segmento')

@section('content')
    <h1 class="mt-4 mb-4">Editar Segmento</h1>

    <a href="{{ route('admin.segments.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.segments.update', $segment) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nome do Segmento</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $segment->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $segment->description) }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Atualizar Segmento</button>
            </form>
        </div>
    </div>
@endsection