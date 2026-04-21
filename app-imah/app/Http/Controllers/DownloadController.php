<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DownloadController extends Controller
{
    public function index()
    {
        $csvPath = storage_path('app/uploads.csv');
        $images = [];
        $videos = [];
        $pdfs = [];

        if (!file_exists($csvPath)) {
            Log::error('Arquivo CSV não encontrado: ' . $csvPath);
            return view('downloads', compact('images', 'videos', 'pdfs'));
        }

        $file = fopen($csvPath, 'r');
        $header = fgetcsv($file); // Lê o cabeçalho
        if ($header === false) {
            Log::error('Erro ao ler o cabeçalho do CSV: ' . $csvPath);
            fclose($file);
            return view('downloads', compact('images', 'videos', 'pdfs'));
        }

        Log::info('Cabeçalho do CSV: ' . json_encode($header));

        while ($row = fgetcsv($file)) {
            if (count($row) !== count($header)) {
                Log::warning('Linha inválida no CSV: ' . json_encode($row));
                continue;
            }

            $item = array_combine($header, $row);
            if ($item === false) {
                Log::warning('Erro ao combinar cabeçalho com linha: ' . json_encode($row));
                continue;
            }

            Log::info('Linha do CSV: ' . json_encode($item));

            if (!isset($item['tipo'])) {
                Log::warning('Chave "tipo" ausente: ' . json_encode($item));
                continue;
            }

            $type = $item['tipo'];
            // Construir o caminho com base no tipo
            $folder = $type === 'imagem' ? 'imagem' : ($type === 'video' ? 'video' : 'pdf');
            $path = "/storage/uploads/{$folder}/{$item['nome_arquivo']}";

            $entry = [
                'name' => $item['descricao'] ?? $item['nome_arquivo'], // Usa descrição como nome, ou nome_arquivo como fallback
                'filename' => $item['nome_arquivo'],
                'path' => $path
            ];

            if ($type === 'imagem') {
                $images[] = $entry;
            } elseif ($type === 'video') {
                $videos[] = $entry;
            } elseif ($type === 'pdf') {
                $pdfs[] = $entry;
            }
        }
        fclose($file);

        // Ordenar alfabeticamente pelo nome
        usort($images, fn($a, $b) => strcmp($a['name'], $b['name']));
        usort($videos, fn($a, $b) => strcmp($a['name'], $b['name']));
        usort($pdfs, fn($a, $b) => strcmp($a['name'], $b['name']));

        return view('downloads', compact('images', 'videos', 'pdfs'));
    }
}