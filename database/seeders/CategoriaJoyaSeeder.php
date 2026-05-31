<?php

namespace Database\Seeders;

use App\Models\CategoriaJoya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class CategoriaJoyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaJoya::create([
            'nombre_categoria' => 'Anillos'
        ]);

        CategoriaJoya::create([
            'nombre_categoria' => 'Aretes'
        ]);

        CategoriaJoya::create([
            'nombre_categoria' => 'Pulseras'
        ]);

        CategoriaJoya::create([
            'nombre_categoria' => 'Collares'
        ]);
    }
}
