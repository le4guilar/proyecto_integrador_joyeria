@extends('plantilla-principal')
@section('contenido')

<div class="container-fluid bg-alba-crema py-5">

    <div class="container text-center mb-5 mt-3 pt-5">
        <h1 class="display-about-title"> SOBRE NOSOTROS</h1>
        <p class="text-alba-bordo text-uppercase small letter-spacing-2">Nuestra Historia, Tu Distincion.</p>
        <hr class="mx-auto" style="width: 100px; opacity: 0.2; color: #300403;">
    </div>

    <div class="container my-5 py-5">
        <div class="row align-items-center justify-content-center g-5">
            <div class="col-md-5">
                <img src="{{ asset('img/Taller.png') }}" class="img-fluid img-sobre-nosotros shadow-sm" alt="Manifiesto ALBA">
            </div>
            <div class="col-md-5">
                <h2 class="nombre-joya text-start mb-4 text-uppercase">Nuestra Misión y Filosofía</h2>
                <p class="parrafo-nosotros">
                    Desde este año, ALBA ha abierto sus puertas con la misión fundamental de perfeccionar cada momento especial y emotivo en la vida de nuestros usuarios. Nacimos con metas claras y el sueño persistente de crecer junto a nuestros clientes, basándonos siempre en los pilares innegociables de la calidad y la confianza. Creemos firmemente que cada persona es única y especial. Por ello es que nuestra filosofía se centra en ofrecer piezas que no solo siguen las tendencias más exigentes de la moda sino que también brindan una gran libertad de personalización, permitiendo que cada joya cuente una historia propia. La tuya
                </p>
            </div>
        </div>
    </div>

    <div class="row my-5 py-5 justify-content-center bg-white border-top border-bottom">
        <div class="col-md-7 text-center py-4">
            <h3 class="quote-alba">
                Entendemos que una joya es más que un simple accesorio; es una inversión emocional y un símbolo de distinción.
            </h3>
        </div>
    </div>

    <div class="container my-5 py-5">
        <div class="row align-items-center justify-content-center g-5 flex-md-row-reverse">
            <div class="col-md-5">
                <img src="{{ asset('img/Nosotros.png') }}" class="img-fluid img-sobre-nosotros">
            </div>
            <div class="col-md-5">
                <h2 class="nombre-joya text-start mb-4 text-uppercase">Detras de cada pieza</h2>
                <p class="parrafo-nosotros">
                    Por esta razón, ALBA posee diseños que dan libertad, asegurando que nuestros clientes encuentren exactamente lo que necesitan para celebrar sus momentos más importantes. Ya sea que busque un collar significativo o unos finos pendientes, nuestra infraestructura está diseñada para garantizar un estándar de lujo.
                    Detrás de cada pieza hay un gran equipo humano, capacitado y comprometido cons excelencia y atención al detalle. Priorizamos la mejor experiencia de usuario, asegurando que nuestra gente esté siempre lista para responder a todas las dudas con la mayor claridad y eficiencia. Gestionamos nuestros procesos internos para cumplir con la entrega de sus pedidos en el menor tiempo posible, combinando la calidez de la atención tradicional con una infraestructura de comercio electrónico de vanguardia que nos permite llegar a cada hogar con la seguridad y seriedad que nos caracteriza desde nuestros inicios.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection