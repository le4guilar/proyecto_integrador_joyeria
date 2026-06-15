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
            ['nombre' => 'Anillo Cruzado Brillante de Oro Blanco', 'precio' => 51634.94, 'img' => 'img/Catalogo/Pagina1/Anillo1.png', 'cat' => 1, 'desc' => 'Diseño cruzado en oro blanco con incrustaciones brillantes para un destello continuo.'],
            ['nombre' => 'Anillo "Ondas Lumiére"', 'precio' => 51634.94, 'img' => 'img/Catalogo/Pagina1/Anillo2.png', 'cat' => 1, 'desc' => 'Delicadas ondas de plata que capturan y reflejan la luz natural.'],
            ['nombre' => 'Anillo "Multibanda Élite"', 'precio' => 51634.94, 'img' => 'img/Catalogo/Pagina1/Anillo3.png', 'cat' => 1, 'desc' => 'Elegante diseño de múltiples bandas entrelazadas con finos acabados.'],
            // Aretes (Categoría 2)
            ['nombre' => 'Argolla "Huggies Eternity"', 'precio' => 42500.00, 'img' => 'img/Catalogo/Pagina1/arete1.png', 'cat' => 2, 'desc' => 'Argollas clásicas que abrazan el lóbulo con un círculo continuo de destellos.'],
            ['nombre' => 'Aros "Ondas Platino"', 'precio' => 38900.00, 'img' => 'img/Catalogo/Pagina1/arete2.png', 'cat' => 2, 'desc' => 'Modernos aros de platino con una sutil textura ondulada.'],
            ['nombre' => 'Pendientes "Gotas de luz"', 'precio' => 45200.00, 'img' => 'img/Catalogo/Pagina1/arete3.png', 'cat' => 2, 'desc' => 'Elegantes pendientes en forma de gota con un acabado pulido a mano.'],
            // Pulseras (Categoría 3)
            ['nombre' => 'Brazalete "Destello Infinito"', 'precio' => 65800.00, 'img' => 'img/Catalogo/Pagina1/Pulsera1.png', 'cat' => 3, 'desc' => 'Brazalete rígido de oro blanco con una línea central brillante.'],
            ['nombre' => 'Esclava "Ondas de Plata"', 'precio' => 48200.00, 'img' => 'img/Catalogo/Pagina1/Pulsera2.png', 'cat' => 3, 'desc' => 'Esclava clásica rediseñada con motivos ondulados en plata de ley.'],
            ['nombre' => 'Pulsera Tennis "Élite Diamond"', 'precio' => 72500.00, 'img' => 'img/Catalogo/Pagina1/Pulsera3.png', 'cat' => 3, 'desc' => 'La clásica pulsera de estilo tennis perfecta para eventos de gala.'],
            // Collares (Categoría 4)
            ['nombre' => 'Gargantilla "Solitario Astral"', 'precio' => 53900.00, 'img' => 'img/Catalogo/Pagina1/collar1.png', 'cat' => 4, 'desc' => 'Gargantilla minimalista con un único cristal central resplandeciente.'],
            ['nombre' => 'Collar Multiplaca "Rocío de Luna"', 'precio' => 58900.00, 'img' => 'img/Catalogo/Pagina1/collar2.png', 'cat' => 4, 'desc' => 'Collar en capas adornado con pequeñas placas reflectantes.'],
            ['nombre' => 'Collar Tennis "Brillo Supremo"', 'precio' => 85600.00, 'img' => 'img/Catalogo/Pagina1/collar3.png', 'cat' => 4, 'desc' => 'Collar de caída perfecta que aporta elegancia absoluta al cuello.'],

            // --- CATÁLOGO 2 ---
            // Anillos (Categoría 1)
            ['nombre' => 'Anillo "Estela Polar"', 'precio' => 49600.00, 'img' => 'img/Catalogo/Pagina2/anillo4.png', 'cat' => 1, 'desc' => 'Anillo vanguardista inspirado en las líneas rectas de las estrellas fugaces.'],
            ['nombre' => 'Anillo "Dualidad Nova"', 'precio' => 52100.00, 'img' => 'img/Catalogo/Pagina2/anillo5.png', 'cat' => 1, 'desc' => 'Diseño de doble aro que simboliza el equilibrio perfecto entre luz y forma.'],
            ['nombre' => 'Anillo "Marea de Plata"', 'precio' => 55300.00, 'img' => 'img/Catalogo/Pagina2/anillo6.png', 'cat' => 1, 'desc' => 'Anillo de banda ancha con suaves relieves que evocan el movimiento del mar.'],
            // Aretes (Categoría 2)
            ['nombre' => 'Aros "Cubo de Hielo"', 'precio' => 42500.00, 'img' => 'img/Catalogo/Pagina2/arete4.png', 'cat' => 2, 'desc' => 'Aros de diseño geométrico con incrustaciones de corte princesa.'],
            ['nombre' => 'Argolla "Eclipse Minimas"', 'precio' => 40000.00, 'img' => 'img/Catalogo/Pagina2/arete5.png', 'cat' => 2, 'desc' => 'Argollas pequeñas, lisas y sutiles, ideales para un uso sofisticado diario.'],
            ['nombre' => 'Aretes "Lágrima de Venus"', 'precio' => 45200.00, 'img' => 'img/Catalogo/Pagina2/arete6.png', 'cat' => 2, 'desc' => 'Aretes colgantes con un diseño fluido que estiliza el rostro.'],
            // Pulseras (Categoría 3)
            ['nombre' => 'Brazalete "Pulso Galáctico"', 'precio' => 65900.00, 'img' => 'img/Catalogo/Pagina2/pulsera4.png', 'cat' => 3, 'desc' => 'Brazalete moderno con acentos asimétricos y un pulido de alto brillo.'],
            ['nombre' => 'Pulsera "Vía Láctea"', 'precio' => 48200.00, 'img' => 'img/Catalogo/Pagina2/pulsera5.png', 'cat' => 3, 'desc' => 'Fina pulsera adornada con una constelación de pequeños detalles luminosos.'],
            ['nombre' => 'Pulsera Tennis "Hebra de Diamante"', 'precio' => 72500.00, 'img' => 'img/Catalogo/Pagina2/pulsera6.png', 'cat' => 3, 'desc' => 'Delicada pulsera articulada que envuelve la muñeca con total fluidez.'],
            // Collares (Categoría 4)
            ['nombre' => 'Collar "Halo de Luna"', 'precio' => 54900.00, 'img' => 'img/Catalogo/Pagina2/collar4.png', 'cat' => 4, 'desc' => 'Cadena fina con un dije circular hueco que enmarca la piel.'],
            ['nombre' => 'Gargantilla "Dúo Florar Blanco"', 'precio' => 60000.00, 'img' => 'img/Catalogo/Pagina2/collar5.png', 'cat' => 4, 'desc' => 'Diseño romántico de oro blanco con dos delicados motivos florales entrelazados.'],
            ['nombre' => 'Collar "Cascada de Luz"', 'precio' => 90600.00, 'img' => 'img/Catalogo/Pagina2/collar6.png', 'cat' => 4, 'desc' => 'Espectacular collar de noche con múltiples caídas de piezas brillantes.'],
        ];

        foreach ($productos as $producto) {
            Producto::create([
                'nombre_joya'       => $producto['nombre'],
                'descripcion'       => $producto['desc'], 
                'precio_unitario'   => $producto['precio'],
                'stock'             => 20, 
                'stock_bajo'        => 5,  
                'url_imagen'        => $producto['img'],
                'activo'            => true,
                'categoria_joya_id' => $producto['cat'],
                'genero_joya_id'    => 1, // ID 1 (Femenino) por defecto
            ]);
        }
    }
}