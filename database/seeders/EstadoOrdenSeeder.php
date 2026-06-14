<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstadoOrden;

class EstadoOrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            ['nombre_estado_orden' => 'Pagado'],
            ['nombre_estado_orden' => 'Preparando'],
            ['nombre_estado_orden' => 'En camino'],
            ['nombre_estado_orden' => 'Entregado'],
            ['nombre_estado_orden' => 'Cancelado'],
        ];

        foreach ($estados as $estado) {
            // firstOrCreate evita duplicados si volvés a ejecutar el seeder
            EstadoOrden::firstOrCreate(
                ['nombre_estado_orden' => $estado['nombre_estado_orden']],
                $estado
            );
        }
    }
}
