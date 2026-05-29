<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;  //nombre del modelo para el que usamos el seeder

class RolSeeder extends Seeder
{
    public function run(): void
    {
        // Registro para Administrador
        Rol::create([
            'nombre_rol' => 'admin'
        ]);

        // Registro para Cliente
        Rol::create([
            'nombre_rol' => 'cliente'
        ]);
    }
}
