<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProProcess;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processes = [
            [
                'pro_name' => 'Ingeniería',
                'pro_prefix' => 'ING',
            ],
            [
                'pro_name' => 'Marketing',
                'pro_prefix' => 'MKT',
            ],
            [
                'pro_name' => 'Recursos Humanos',
                'pro_prefix' => 'RH',
            ],
            [
                'pro_name' => 'Ventas',
                'pro_prefix' => 'VTA',
            ],
            [
                'pro_name' => 'Producción',
                'pro_prefix' => 'PROD',
            ],
        ];

        foreach ($processes as $process) {
            ProProcess::create($process);
        }
    }
}
