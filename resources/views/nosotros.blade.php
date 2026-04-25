@extends('plantilla-principal')
@section('contenido')


        <div class="container">
            <h2 class="display-4 mb-4 mt-3">SOBRE NOSOTROS</h2   >

            <div class="row justify-content-center mb-5">
                <div class="col-md-10">
                    <p class="lead">
                        Desde este año, ALBA ha abierto sus puertas con la misión fundamental de perfeccionar cada momento especial y emotivo en la vida de nuestros usuarios. Nacimos con metas claras y el sueño persistente de crecer junto a nuestros clientes, basándonos siempre en los pilares innegociables de la calidad y la confianza. Creemos firmemente que cada persona es única y especial. Por ello es que nuestra filosofía se centra en ofrecer piezas que no solo siguen las tendencias más exigentes de la moda sino que también brindan una gran libertad de personalización, permitiendo que cada joya cuente una historia propia. La tuya.
                        Entendemos que una joya es más que un simple accesorio; es una inversión emocional y un símbolo de distinción. Por esta razón, ALBA posee diseños que dan libertad, asegurando que nuestros clientes encuentren exactamente lo que necesitan para celebrar sus momentos más importantes. Ya sea que busque un collar significativo o unos finos pendientes, nuestra infraestructura está diseñada para garantizar un estándar de lujo.
                        Detrás de cada pieza hay un gran equipo humano, capacitado y comprometido cons excelencia y atención al detalle. Priorizamos la mejor experiencia de usuario, asegurando que nuestra gente esté siempre lista para responder a todas las dudas con la mayor claridad y eficiencia. Gestionamos nuestros procesos internos para cumplir con la entrega de sus pedidos en el menor tiempo posible, combinando la calidez de la atención tradicional con una infraestructura de comercio electrónico de vanguardia que nos permite llegar a cada hogar con la seguridad y seriedad que nos caracteriza desde nuestros inicios.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center gap-5">
                <div class="col-md-3 text-center">
                    <div class="ratio ratio-4x3 border border-warning border-4 mb-3 overflow-hidden">
                        <img src="{{ asset('img/pfp-lean.jpeg') }}" class="img-fit"     alt="foto-alumno">
                    </div>
                    <div class="card-body-custom">
                        <a href="#" class="btn btn-orange">Ir al github</a>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="ratio ratio-4x3 border border-warning border-4 mb-3 overflow-hidden">
                        <img src="{{ asset('img/pfp-lean.jpeg') }}" class="img-fit" alt="foto-alumno">
                    </div>
                    <div class="card-body-custom">
                        <a href="#" class="btn btn-orange">Ir al github</a>
                    </div>
                </div>
            </div>
        </div>
   
@endsection