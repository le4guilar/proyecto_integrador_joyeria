<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class ProvinciaSeeder extends Seeder
{
    public function run(): void
    {
        $provincias = [
            ['id' => 1, 'nombre_provincia' => 'Buenos Aires'],
            ['id' => 2, 'nombre_provincia' => 'Ciudad Autónoma de Buenos Aires'],
            ['id' => 3, 'nombre_provincia' => 'Catamarca'],
            ['id' => 4, 'nombre_provincia' => 'Chaco'],
            ['id' => 5, 'nombre_provincia' => 'Chubut'],
            ['id' => 6, 'nombre_provincia' => 'Córdoba'],
            ['id' => 7, 'nombre_provincia' => 'Corrientes'],
            ['id' => 8, 'nombre_provincia' => 'Entre Ríos'],
            ['id' => 9, 'nombre_provincia' => 'Formosa'],
            ['id' => 10, 'nombre_provincia' => 'Jujuy'],
            ['id' => 11, 'nombre_provincia' => 'La Pampa'],
            ['id' => 12, 'nombre_provincia' => 'La Rioja'],
            ['id' => 13, 'nombre_provincia' => 'Mendoza'],
            ['id' => 14, 'nombre_provincia' => 'Misiones'],
            ['id' => 15, 'nombre_provincia' => 'Neuquén'],
            ['id' => 16, 'nombre_provincia' => 'Río Negro'],
            ['id' => 17, 'nombre_provincia' => 'Salta'],
            ['id' => 18, 'nombre_provincia' => 'San Juan'],
            ['id' => 19, 'nombre_provincia' => 'San Luis'],
            ['id' => 20, 'nombre_provincia' => 'Santa Cruz'],
            ['id' => 21, 'nombre_provincia' => 'Santa Fe'],
            ['id' => 22, 'nombre_provincia' => 'Santiago del Estero'],
            ['id' => 23, 'nombre_provincia' => 'Tierra del Fuego'],
            ['id' => 24, 'nombre_provincia' => 'Tucumán'],
        ];

        foreach ($provincias as $provincia) {
            Provincia::updateOrCreate(
                //['id' => $provincia['id']],
                ['nombre_provincia' => $provincia['nombre_provincia']]
            );
        }
    }
}
