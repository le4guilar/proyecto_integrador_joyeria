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
        $productos = [
            // --- CATÁLOGO 1 ---
            // Anillos (Categoría 1)
            ['nombre' => 'Anillo Cruzado Brillante de Oro Blanco', 'precio' => 51634.94, 'img' => 'img/Catalogo/Pagina1/Anillo1.png', 'cat' => 1],
            ['nombre' => 'Anillo "Ondas Lumiére"', 'precio' => 51634.94, 'img' => 'img/Catalogo/Pagina1/Anillo2.png', 'cat' => 1],
            ['nombre' => 'Anillo "Multibanda Élite"', 'precio' => 51634.94, 'img' => 'img/Catalogo/Pagina1/Anillo3.png', 'cat' => 1],
            // Aretes (Categoría 2)
            ['nombre' => 'Argolla "Huggies Eternity"', 'precio' => 42500.00, 'img' => 'img/Catalogo/Pagina1/arete1.png', 'cat' => 2],
            ['nombre' => 'Aros "Ondas Platino"', 'precio' => 38900.00, 'img' => 'img/Catalogo/Pagina1/arete2.png', 'cat' => 2],
            ['nombre' => 'Pendientes "Gotas de luz"', 'precio' => 45200.00, 'img' => 'img/Catalogo/Pagina1/arete3.png', 'cat' => 2],
            // Pulseras (Categoría 3)
            ['nombre' => 'Brazalete "Destello Infinito"', 'precio' => 65800.00, 'img' => 'img/Catalogo/Pagina1/Pulsera1.png', 'cat' => 3],
            ['nombre' => 'Esclava "Ondas de Plata"', 'precio' => 48200.00, 'img' => 'img/Catalogo/Pagina1/Pulsera2.png', 'cat' => 3],
            ['nombre' => 'Pulsera Tennis "Élite Diamond"', 'precio' => 72500.00, 'img' => 'img/Catalogo/Pagina1/Pulsera3.png', 'cat' => 3],
            // Collares (Categoría 4)
            ['nombre' => 'Gargantilla "Solitario Astral"', 'precio' => 53900.00, 'img' => 'img/Catalogo/Pagina1/collar1.png', 'cat' => 4],
            ['nombre' => 'Collar Multiplaca "Rocío de Luna"', 'precio' => 58900.00, 'img' => 'img/Catalogo/Pagina1/collar2.png', 'cat' => 4],
            ['nombre' => 'Collar Tennis "Brillo Supremo"', 'precio' => 85600.00, 'img' => 'img/Catalogo/Pagina1/collar3.png', 'cat' => 4],

            // --- CATÁLOGO 2 ---
            // Anillos (Categoría 1)
            ['nombre' => 'Alianza "Estela Polar"', 'precio' => 49600.00, 'img' => 'img/Catalogo/Pagina2/anillo4.png', 'cat' => 1],
            ['nombre' => 'Anillo "Dualidad Nova"', 'precio' => 52100.00, 'img' => 'img/Catalogo/Pagina2/anillo5.png', 'cat' => 1],
            ['nombre' => 'Anillo "Marea de Plata"', 'precio' => 55300.00, 'img' => 'img/Catalogo/Pagina2/anillo6.png', 'cat' => 1],
            // Aretes (Categoría 2)
            ['nombre' => 'Aros "Cubo de Hielo"', 'precio' => 42500.00, 'img' => 'img/Catalogo/Pagina2/arete4.png', 'cat' => 2],
            ['nombre' => 'Argolla "Eclipse Minimas"', 'precio' => 40000.00, 'img' => 'img/Catalogo/Pagina2/arete5.png', 'cat' => 2],
            ['nombre' => 'Aretes "Lágrima de Venus"', 'precio' => 45200.00, 'img' => 'img/Catalogo/Pagina2/arete6.png', 'cat' => 2],
            // Pulseras (Categoría 3)
            ['nombre' => 'Brazalete "Pulso Galáctico"', 'precio' => 65900.00, 'img' => 'img/Catalogo/Pagina2/pulsera4.png', 'cat' => 3],
            ['nombre' => 'Pulsera "Vía Láctea"', 'precio' => 48200.00, 'img' => 'img/Catalogo/Pagina2/pulsera5.png', 'cat' => 3],
            ['nombre' => 'Pulsera Tennis "Hebra de Diamante"', 'precio' => 72500.00, 'img' => 'img/Catalogo/Pagina2/pulsera6.png', 'cat' => 3],
            // Collares (Categoría 4)
            ['nombre' => 'Collar "Halo de Luna"', 'precio' => 54900.00, 'img' => 'img/Catalogo/Pagina2/collar4.png', 'cat' => 4],
            ['nombre' => 'Gargantilla "Dúo Florar Blanco"', 'precio' => 60000.00, 'img' => 'img/Catalogo/Pagina2/collar5.png', 'cat' => 4],
            ['nombre' => 'Collar "Cascada de Luz"', 'precio' => 90600.00, 'img' => 'img/Catalogo/Pagina2/collar6.png', 'cat' => 4],
        ];

        foreach ($productos as $producto) {
            Producto::create([
                'nombre_joya'       => $producto['nombre'],
                'descripcion'       => 'Hermosa pieza de la Colección Oro Blanco & Platino.', // Genérico, se puede ajustar
                'precio_unitario'   => $producto['precio'],
                'stock'             => 20, // Stock por defecto
                'stock_bajo'        => 5,  // Umbral de stock bajo
                'url_imagen'        => $producto['img'],
                'activo'            => true,
                'categoria_joya_id' => $producto['cat'],
                'genero_joya_id'    => 1, // ID 1 (Femenino) por defecto
            ]);
        }
    }
}