<?php

namespace Database\Seeders;

use App\Models\Segment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SegmentSeeder extends Seeder
{
    public function run(): void
    {

        $now = Carbon::now();

        $segments = [
            [
                'name'        => 'Impressão Digital',
                'description' => 'Impressão em alta resolução para materiais variados.',
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name'        => 'Sublimação',
                'description' => 'Impressão por sublimação em tecidos e materiais poliméricos.',
                'created_at' => $now, 
                'updated_at' => $now

            ],
            [
                'name'        => 'Têxtil',
                'description' => 'Impressão em tecidos, malhas e materiais flexíveis.',
                'created_at' => $now, 
                'updated_at' => $now

            ],
            [
                'name'        => 'Industrial',
                'description' => 'Máquinas para produção em larga escala e uso industrial.',
                'created_at' => $now, 
                'updated_at' => $now

            ],
            [
                'name'        => 'Gráfica',
                'description' => 'Impressão gráfica tradicional e offset.',
                'created_at' => $now, 
                'updated_at' => $now

            ],
            [
                'name'        => 'Publicidade e Comunicação Visual',
                'description' => 'Impressão para banners, adesivos, totens e materiais de PDV.',
                'created_at' => $now, 
                'updated_at' => $now

            ],
            [
                'name'        => 'Embalagens',
                'description' => 'Impressão em caixas, rótulos e embalagens personalizadas.',
                'created_at' => $now, 
                'updated_at' => $now
            ],
        ];

        foreach ($segments as $segment) {
            Segment::updateOrCreate(
                ['name' => $segment['name']],
                $segment
            );
        }

        $this->command->info('✅ ' . count($segments) . ' segmentos foram criados com sucesso!');
    }
}