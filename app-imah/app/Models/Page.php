<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Page extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'equipment'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function parseContent()
    {
        $parsedown = new Parsedown();
        $parsedown->setBreaksEnabled(true); // Habilita quebras de linha automáticas
        $lines = explode("\n", $this->content);
        $metadata = [];
        $contentLines = [];

        foreach ($lines as $line) {
            $line = trim($line, " \t\n\r\0\x0B");
            if (empty($line)) {
                $contentLines[] = ''; // Mantém linhas vazias pra quebras de linha
                continue;
            }

            if (preg_match('/^\[(.+?)\]:\s*(.+)$/', $line, $matches)) {
                $key = $matches[1];
                $value = trim($matches[2], " \t\n\r\0\x0B");
                if ($key === 'images') {
                    $images = is_string($value) ? array_map('trim', explode(',', $value)) : [];
                    $metadata[$key] = $images;
                } else {
                    $metadata[$key] = $value;
                }
            } else {
                $contentLines[] = $line;
            }
        }

        $images = $metadata['images'] ?? [];
        $this->attributes['images'] = json_encode($images);
        $this->video = $metadata['video'] ?? null;
        $this->pdf = $metadata['pdf'] ?? null;

        // Parseia todo o conteúdo como um único bloco de Markdown
        $this->content_html = $parsedown->text(implode("\n", $contentLines));
    }

    public function getImagesAttribute($value)
    {
        return is_array($value) ? $value : (json_decode($value, true) ?: []);
    }
}