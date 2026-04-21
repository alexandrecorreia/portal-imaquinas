<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminUploadController extends Controller
{
    public function indexImages(Request $request)
    {
        //Log::info('Acessando indexImages');
        $uploads = $this->getUploads('imagem', $request->query('search'), $request->query('date'));
        return view('admin.uploads.images', compact('uploads'));
    }

    public function indexVideos(Request $request)
    {
        //Log::info('Acessando indexVideos');
        $uploads = $this->getUploads('video', $request->query('search'), $request->query('date'));
        return view('admin.uploads.videos', compact('uploads'));
    }

    public function indexPdfs(Request $request)
    {
        //Log::info('Acessando indexPdfs');
        $uploads = $this->getUploads('pdf', $request->query('search'), $request->query('date'));
        return view('admin.uploads.pdfs', compact('uploads'));
    }

    public function upload(Request $request)
    {
        //Log::info('Acessando upload', ['tipo' => $request->tipo]);
        $request->validate([
            'tipo' => 'required|in:imagem,video,pdf',
            'arquivo' => 'required|file|mimes:jpg,png,mp4,pdf|max:51200',
            'descricao' => 'nullable|string|max:255',
        ]);

        $tipo = $request->tipo;
        $arquivo = $request->file('arquivo');
        $descricao = $request->input('descricao', '');
        $nomeArquivo = time() . '_' . $arquivo->getClientOriginalName();
        $caminho = "uploads/$tipo/" . $nomeArquivo;

        // Usa o disco 'public' em vez do padrão 'local'
        Storage::disk('public')->put($caminho, file_get_contents($arquivo));

        $this->saveToCsv($tipo, $nomeArquivo, $descricao);

        if ($tipo === 'imagem') {
            return redirect()->route("admin.imagens")->with('success', 'Arquivo enviado com sucesso!');
        }

        if ($tipo === 'video') {
            return redirect()->route("admin.videos")->with('success', 'Arquivo enviado com sucesso!');
        }

        if ($tipo === 'pdf') {
            return redirect()->route("admin.pdfs")->with('success', 'Arquivo enviado com sucesso!');
        }
    }

    public function delete(Request $request, $tipo, $nomeArquivo)
    {
        //Log::info('Acessando delete', ['tipo' => $tipo, 'nome_arquivo' => $nomeArquivo]);

        // Valida o tipo
        if (!in_array($tipo, ['imagem', 'video', 'pdf'])) {
            return redirect()->back()->with('error', 'Tipo de arquivo inválido.');
        }

        // Remove o arquivo do storage
        $caminho = "uploads/$tipo/$nomeArquivo";
        if (Storage::disk('public')->exists($caminho)) {
            Storage::disk('public')->delete($caminho);
        }

        // Remove do CSV
        $this->removeFromCsv($tipo, $nomeArquivo);

        if ($tipo === 'imagem') {
            return redirect()->route("admin.imagens")->with('success', 'Arquivo deletado com sucesso!');
        }

        if ($tipo === 'video') {
            return redirect()->route("admin.videos")->with('success', 'Arquivo deletado com sucesso!');
        }
        
        if ($tipo === 'pdf') {
            return redirect()->route("admin.pdfs")->with('success', 'Arquivo deletado com sucesso!');
        }
    }

    private function getUploads($tipo, $search = null, $date = null)
    {
        $csvPath = storage_path('app/uploads.csv');
        $uploads = [];

        if (file_exists($csvPath)) {
            $file = fopen($csvPath, 'r');
            fgetcsv($file); // Pula o cabeçalho
            while (($row = fgetcsv($file)) !== false) {
                if ($row[0] === $tipo) {
                    // Aplica filtros de busca e data, se fornecidos
                    if ($search && stripos($row[2], $search) === false) {
                        continue;
                    }
                    if ($date && $row[3] !== $date) {
                        continue;
                    }
                    $uploads[] = [
                        'tipo' => $row[0],
                        'nome_arquivo' => $row[1],
                        'descricao' => $row[2],
                        'data_upload' => $row[3],
                    ];
                }
            }
            fclose($file);
        }

        return $uploads;
    }

    private function saveToCsv($tipo, $nomeArquivo, $descricao)
    {
        $csvPath = storage_path('app/uploads.csv');
        $data = date('Y-m-d');
        $row = [$tipo, $nomeArquivo, $descricao, $data];

        if (!file_exists($csvPath)) {
            $file = fopen($csvPath, 'w');
            fputcsv($file, ['tipo', 'nome_arquivo', 'descricao', 'data_upload']);
        } else {
            $file = fopen($csvPath, 'a');
        }

        fputcsv($file, $row);
        fclose($file);
    }

    private function removeFromCsv($tipo, $nomeArquivo)
    {
        $csvPath = storage_path('app/uploads.csv');
        $tempPath = storage_path('app/uploads_temp.csv');
        $found = false;

        if (file_exists($csvPath)) {
            $file = fopen($csvPath, 'r');
            $temp = fopen($tempPath, 'w');
            $header = fgetcsv($file);
            fputcsv($temp, $header);

            while (($row = fgetcsv($file)) !== false) {
                if ($row[0] === $tipo && $row[1] === $nomeArquivo) {
                    $found = true;
                    continue;
                }
                fputcsv($temp, $row);
            }

            fclose($file);
            fclose($temp);

            if ($found) {
                rename($tempPath, $csvPath);
            } else {
                unlink($tempPath);
            }
        }

        return $found;
    }
}