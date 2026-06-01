<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Joya de prueba 1: in anillo para categoria 'Anillos' (ID 1) y genero 'Femenino' (ID 1)
        Producto::create([
            'nombre_joya'       => 'Anillo Infinity Shine',
            'descripcion'       => 'Diseño entrelazado que simboliza la unión perfecta entre elegancia y brillo.',
            'precio_unitario'   => 95000.00,
            'stock'             => 12,
            'stock_bajo'        => 5,
            'url_imagen'        => 'productos/anillo_infinity.webp', // Simula la ruta de storage
            'activo'            => true,
            'categoria_joya_id' => 1, // ID de Anillos en el seeder
            'genero_joya_id'    => 1, // ID de Femenino en el seeder
        ]);

        // Joya de prueba 2: cadena para categoria 'Collares' (ID 4) y genero 'Masculino' (ID 2 o el que corresponda)
        Producto::create([
            'nombre_joya'       => 'Cadena Eslabón Cubano',
            'descripcion'       => 'Cadena robusta de plata de ley, ideal para uso diario con cierre de seguridad.',
            'precio_unitario'   => 150000.00,
            'stock'             => 4, // este va a salir en ROJO en la tabla porque es menor al stock bajo
            'stock_bajo'        => 6,
            'url_imagen'        => 'productos/cadena_cubana.webp',
            'activo'            => true,
            'categoria_joya_id' => 4, // ID de Collares
            'genero_joya_id'    => 2, // ID de Masculino/Unisex
        ]);

        // Joya de prueba 3: aritos para categoria 'Aretes' (ID 2)
        Producto::create([
            'nombre_joya'       => 'Aros Colgantes Gota',
            'descripcion'       => 'Aritos delicados con piedras brillantes engarzadas, ideales para fiesta.',
            'precio_unitario'   => 65000.00,
            'stock'             => 20,
            'stock_bajo'        => 4,
            'url_imagen'        => 'productos/aros_gota.webp',
            'activo'            => true,
            'categoria_joya_id' => 2, // ID de Aretes
            'genero_joya_id'    => 1, 
        ]);
    }
}