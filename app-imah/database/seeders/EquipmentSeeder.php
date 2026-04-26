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
            ['name' => 'Impressoras',    'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Envernizadoras', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Secagem',        'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Laboratórios',   'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Laminadoras',    'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Acessórios',     'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('equipaments')->insert($equipments);
    }
}