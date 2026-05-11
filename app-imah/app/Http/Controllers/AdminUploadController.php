<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminUploadController extends Controller
{
    public function indexImages(Request $request)
    {
        $uploads = Upload::where('type', 'image')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.uploads.images', compact('uploads'));
    }

    public function indexVideos(Request $request)
    {
        $uploads = Upload::where('type', 'video')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.uploads.videos', compact('uploads'));
    }

    public function indexPdfs(Request $request)
    {
        $uploads = Upload::where('type', 'pdf')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.uploads.pdfs', compact('uploads'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'tipo'    => 'required|in:imagem,video,pdf',
            'arquivo' => 'required|file|max:51200',
            'descricao' => 'nullable|string|max:300',
        ]);

        $tipo = $request->tipo;
        $file = $request->file('arquivo');
        $descricao = $request->descricao;

        $typeMap = [
            'imagem' => 'image',
            'video'  => 'video',
            'pdf'    => 'pdf',
        ];

        $type = $typeMap[$tipo];
        $extension = $file->getClientOriginalExtension();
        $generatedName = substr(time(), -6) . '-' . Str::random(6) . '.' . strtolower($extension);
        $path = "uploads/{$type}/{$generatedName}";

        // Salva arquivo
        Storage::disk('public')->put($path, file_get_contents($file));

        // Salva no banco
        $upload = Upload::create([
            'type'           => $type,
            'original_name'  => $file->getClientOriginalName(),
            'generated_name' => $generatedName,
            'path'           => $path,
            'description'    => $descricao,
        ]);

        // ==================== AJAX (usado na criação de páginas) ====================
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success'        => true,
                'generated_name' => $generatedName,
                'original_name'  => $file->getClientOriginalName(),
                'path'           => $path,
            ]);
        }

        // ==================== Formulário normal (módulos de upload) ====================
        return match($tipo) {
            'imagem' => redirect()->route('admin.imagens')->with('success', 'Imagem enviada com sucesso!'),
            'video'  => redirect()->route('admin.videos')->with('success', 'Vídeo enviado com sucesso!'),
            'pdf'    => redirect()->route('admin.pdfs')->with('success', 'PDF enviado com sucesso!'),
        };
    }

    public function delete(Request $request, $tipo, $nomeArquivo)
    {
        $upload = Upload::where('generated_name', $nomeArquivo)->firstOrFail();

        // Remove o arquivo físico
        if (Storage::disk('public')->exists($upload->path)) {
            Storage::disk('public')->delete($upload->path);
        }

        $upload->delete();

        return redirect()->back()->with('success', 'Arquivo excluído com sucesso!');
    }
}