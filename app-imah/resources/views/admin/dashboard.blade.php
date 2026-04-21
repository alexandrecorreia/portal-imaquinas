@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mt-4 mb-4">Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title" style="color: #00858D;">Imagens</h5>
                    <p class="card-text">Total: {{ $totalImages }}</p>
                    <p class="card-text">Gerencie suas imagens.</p>
                    <a href="{{ route('admin.imagens') }}" class="btn btn-primary" style="background-color: #00858D; border-color: #00858D;">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title" style="color: #00858D;">Vídeos</h5>
                    <p class="card-text">Total: {{ $totalVideos }}</p>
                    <p class="card-text">Gerencie seus vídeos.</p>
                    <a href="{{ route('admin.videos') }}" class="btn btn-primary" style="background-color: #00858D; border-color: #00858D;">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title" style="color: #00858D;">PDFs</h5>
                    <p class="card-text">Total: {{ $totalPdfs }}</p>
                    <p class="card-text">Gerencie seus PDFs.</p>
                    <a href="{{ route('admin.pdfs') }}" class="btn btn-primary" style="background-color: #00858D; border-color: #00858D;">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title" style="color: #00858D;">Páginas</h5>
                    <p class="card-text">Total: {{ $totalPages }}</p>
                    <p class="card-text">Gerencie suas páginas Markdown.</p>
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-primary" style="background-color: #00858D; border-color: #00858D;">Acessar</a>
                </div>
            </div>
        </div>
    </div>
@endsection