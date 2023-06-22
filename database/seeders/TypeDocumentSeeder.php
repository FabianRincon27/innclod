<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipTipoDoc;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeDocuments = [
            [
                'tip_name' => 'Instructivo',
                'tip_prefix' => 'INS',
            ],
            [
                'tip_name' => 'Reporte',
                'tip_prefix' => 'REP',
            ],
            [
                'tip_name' => 'Contrato',
                'tip_prefix' => 'CON',
            ],
            [
                'tip_name' => 'Presentación',
                'tip_prefix' => 'PRES',
            ],
            [
                'tip_name' => 'Formulario',
                'tip_prefix' => 'FORM',
            ],
        ];

        foreach ($typeDocuments as $typeDocument) {
            TipTipoDoc::create($typeDocument);
        }
    }
}
