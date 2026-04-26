<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $equipments = [
            ['equipament' => 'Impressoras',    'created_at' => $now, 'updated_at' => $now],
            ['equipament' => 'Envernizadoras', 'created_at' => $now, 'updated_at' => $now],
            ['equipament' => 'Secagem',        'created_at' => $now, 'updated_at' => $now],
            ['equipament' => 'Laboratórios',   'created_at' => $now, 'updated_at' => $now],
            ['equipament' => 'Laminadoras',    'created_at' => $now, 'updated_at' => $now],
            ['equipament' => 'Acessórios',     'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('equipments')->insert($equipments);
    }
}