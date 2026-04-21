<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminUploadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Redireciona /admin para /admin/login
Route::redirect('/admin', '/admin/login');

// Rotas de autenticação e uploads
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin.auth')->name('admin.dashboard');

Route::middleware('admin.auth')->group(function () {
    // Rotas de uploads
    Route::get('/admin/imagens', [AdminUploadController::class, 'indexImages'])->name('admin.imagens');
    Route::get('/admin/videos', [AdminUploadController::class, 'indexVideos'])->name('admin.videos');
    Route::get('/admin/pdfs', [AdminUploadController::class, 'indexPdfs'])->name('admin.pdfs');
    Route::get('/admin/dashboard', [PageController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/upload', [AdminUploadController::class, 'upload'])->name('admin.upload');
    Route::delete('/admin/upload/{tipo}/{nomeArquivo}', [AdminUploadController::class, 'delete'])->name('admin.upload.delete');

    // Rotas para gerenciar páginas Markdown
    Route::get('/admin/pages', [PageController::class, 'index'])->name('admin.pages.index');
    Route::get('/admin/pages/create', [PageController::class, 'create'])->name('admin.pages.create');
    Route::post('/admin/pages', [PageController::class, 'store'])->name('admin.pages.store');
    Route::get('/admin/pages/{page}/edit', [PageController::class, 'edit'])->name('admin.pages.edit');
    Route::put('/admin/pages/{page}', [PageController::class, 'update'])->name('admin.pages.update');
    Route::delete('/admin/pages/{page}', [PageController::class, 'destroy'])->name('admin.pages.destroy');
    Route::post('/admin/pages/preview', [PageController::class, 'preview'])->name('admin.pages.preview');
});

// Rota publica para downloads
Route::get('/downloads', [DownloadController::class, 'index'])->name('downloads');

// Rota pública para listar páginas por tipo de equipamento
Route::get('/equipamentos', [PageController::class, 'equipments'])->name('equipamentos.index');

// Rota de contato
Route::get('/contato', function () {
    return view('contato');
})->name('contato');

// Rota da página inicial
Route::get('/', function () {
    return view('index');
});

// Rota pública para exibir páginas Markdown (no final pra evitar conflitos)
Route::get('/{slug}', [PageController::class, 'show'])
    ->name('pages.show')
    ->where('slug', '^(?!admin|contato|equipamentos).*$');

// Rota par envio de email
Route::post('/submit-contact', [ContactController::class, 'submit'])->name('contact.submit');