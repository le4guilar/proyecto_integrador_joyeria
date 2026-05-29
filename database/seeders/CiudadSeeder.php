<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CiudadSeeder extends Seeder
{
    public function run(): void
    {
        $ciudades = [
            ['nombre_ciudad' => 'La Plata', 'codigo_postal' => '1900', 'provincia_id' => 1],
            ['nombre_ciudad' => 'CABA', 'codigo_postal' => '1000', 'provincia_id' => 2],
            ['nombre_ciudad' => 'San Fernando del Valle de Catamarca', 'codigo_postal' => '4700', 'provincia_id' => 3],
            ['nombre_ciudad' => 'Resistencia', 'codigo_postal' => '3500', 'provincia_id' => 4],
            ['nombre_ciudad' => 'Rawson', 'codigo_postal' => '9103', 'provincia_id' => 5],
            ['nombre_ciudad' => 'Córdoba', 'codigo_postal' => '5000', 'provincia_id' => 6],
            ['nombre_ciudad' => 'Corrientes', 'codigo_postal' => '3400', 'provincia_id' => 7],
            ['nombre_ciudad' => 'Paraná', 'codigo_postal' => '3100', 'provincia_id' => 8],
            ['nombre_ciudad' => 'Formosa', 'codigo_postal' => '3600', 'provincia_id' => 9],
            ['nombre_ciudad' => 'San Salvador de Jujuy', 'codigo_postal' => '4600', 'provincia_id' => 10],
            ['nombre_ciudad' => 'Santa Rosa', 'codigo_postal' => '6300', 'provincia_id' => 11],
            ['nombre_ciudad' => 'La Rioja', 'codigo_postal' => '5300', 'provincia_id' => 12],
            ['nombre_ciudad' => 'Mendoza', 'codigo_postal' => '5500', 'provincia_id' => 13],
            ['nombre_ciudad' => 'Posadas', 'codigo_postal' => '3300', 'provincia_id' => 14],
            ['nombre_ciudad' => 'Neuquén', 'codigo_postal' => '8300', 'provincia_id' => 15],
            ['nombre_ciudad' => 'Viedma', 'codigo_postal' => '8500', 'provincia_id' => 16],
            ['nombre_ciudad' => 'Salta', 'codigo_postal' => '4400', 'provincia_id' => 17],
            ['nombre_ciudad' => 'San Juan', 'codigo_postal' => '5400', 'provincia_id' => 18],
            ['nombre_ciudad' => 'San Luis', 'codigo_postal' => '5700', 'provincia_id' => 19],
            ['nombre_ciudad' => 'Río Gallegos', 'codigo_postal' => '9400', 'provincia_id' => 20],
            ['nombre_ciudad' => 'Santa Fe', 'codigo_postal' => '3000', 'provincia_id' => 21],
            ['nombre_ciudad' => 'Santiago del Estero', 'codigo_postal' => '4200', 'provincia_id' => 22],
            ['nombre_ciudad' => 'Ushuaia', 'codigo_postal' => '9410', 'provincia_id' => 23],
            ['nombre_ciudad' => 'San Miguel de Tucumán', 'codigo_postal' => '4000', 'provincia_id' => 24],
        ];

        foreach ($ciudades as $ciudad) {
            Ciudad::updateOrCreate (
                ['nombre_ciudad' => $ciudad['nombre_ciudad'], 'provincia_id' => $ciudad['provincia_id']],
                ['codigo_postal' => $ciudad['codigo_postal']]
            );
        }
    }
}
