<?php

namespace Database\Seeders;

use App\Models\GeneroJoya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneroJoyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneroJoya::create([
            'nombre_genero' => 'Femenino'
        ]);

        GeneroJoya::create([
            'nombre_genero' => 'Masculino'
        ]);

        GeneroJoya::create([
            'nombre_genero' => 'Unisex'
        ]);
    }
}
