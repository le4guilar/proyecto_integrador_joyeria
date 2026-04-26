@extends('plantilla-principal')
@section('contenido')



<!--Primera parte del carrusel-->
<div id="carruselJoyeria" class="carousel slide" data-bs-ride="carousel">

    <!--Insersion de imagenes-->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/Principal1.png') }}" class="d-block w-100" alt="Principal">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('img/Principal2.png') }}" class="d-block w-100" alt="Principal">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carruselJoyeria" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true">
        </span>
        <span class="visually-hidden">
            Anterior
        </span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carruselJoyeria" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true">
        </span>
        <span class="visually-hidden">
            Siguiente
        </span>
    </button>
</div>
<!--Fin de insersion-->
<!--Fin del carrusel-->

<!-- Presentacion de la empresa-->
<section class="container my-5 py-5">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <h6 class="text-uppercase mb-3" style="letter-spacing: 4px; color: #300403; font-weight: 600;">
                ALBA
            </h6>
            <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 mb-4 text-dark">
                Elegancia Atemporal
            </h2>
            <p class="lead text-muted px-lg-5" style="font-size: 1.1rem;">
                Nos dedicamos a la curaduría de piezas únicas que celebran los momentos más importantes de tu vida. Calidad, diseño y compromiso en cada detalle.
            </p>
            <hr class="mx-auto mt-5" style="width: 60px; opacity: 0.2; color: #300403;">
        </div>
    </div>
</section>

<section class="container mb-5 cat-seccion">
    <div class="text-center mb-5">
        <h2 class="text-uppercase" style="letter-spacing: 8px; color: #300403; font-family: 'Cormorant Garamond', serif;">
            Nuestra Colección
        </h2>
        <p class="text-muted small text-uppercase" style="letter-spacing: 2px;">
            Elegancia en cada detalle
        </p>
    </div>
</section>

<!--columna de imagenes-->
<div class="row g-0">
    <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
        <a href="#"> 
            <img src="{{asset('img/anillos.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Anillos">
            <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                <h4 class="card-title m-0"> Anillos </h4>
            </div>
        </a>
    </div>


    <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
        <a href="#"> 
            <img src="{{asset('img/aretes.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Anillos">
            <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                <h4 class="card-title m-0"> Aretes</h4>
            </div>
        </a>
    </div>

    <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
        <a href="#"> <img src="{{asset('img/pulseras.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Anillos">
            <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                <h4 class="card-title m-0">Pulseras</h4>
            </div>
        </a>
    </div>

    <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
        <a href="#"> <img src="{{asset('img/collares.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Anillos">
            <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                <h4 class="card-title m-0"> Collares </h4>
            </div>
        </a>
    </div>
</div>
</section>

<!--TENDENCIA-->
<section class="container-fluid p-0 my-5">
    <div id="carruselTendencia" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carruselTendencia" data-bs-slide="0" class="active"></button>
                <button type="button" data-bs-target="#carruselTendencia" data-bs-slide="1" class="active"></button>
                <button type="button" data-bs-target="#carruselTendencia" data-bs-slide="2" class="active"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/Coleccion-de-noche.png') }}" class="d-block w-100 img-carousel-tendencia" alt="Piezas de Noche">
                    <div class="carousel-caption custom-caption">
                        <h2 class="display-tendencia">Piezas de noche</h2>
                        <p class="lead-tendencia">Brillo eterno para momentos inolvidables.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/Home/Taller1.jpg') }}" class="d-block w-100 img-carousel-tendencia" alt="Artesanía">
                <div class="carousel-caption custom-caption">
                    <h2 class="display-tendencia">Escencia Artesanal</h2>
                    <p class="lead-tendencia">Cada detalle es esculpido con paciencia y tiempo</p>
                </div>
            </div>

            
        </div>
    </div>
</section>


<section class="container my-5 py-5 text-dark">
    <div class="row text-center g-4">
        <div class="col-md-4">
            <i class="bi bi-gem fs-1 "> </i>
            <h5 class="fw-bold mt-3"> Calidad Certificada </h5>
            <p class="text-muted small"> Diamantes y metales de la más alta pureza.</p>
        </div>

        <div class="col-md-4">
            <i class="bi bi-truck fs-1"> </i>
            <h5 class="fw-bold mt-3"> Envío Asegurado </h5>
            <p class="text-muted small"> Llegamos a todo el país con la máxima seguridad.</p>
        </div>

        <div class="col-md-4">
            <i class="bi bi-pencil-square fs-1"> </i>
            <h5 class="fw-bold mt-3">Diseño Personalizado </h5>
            <p class="text-muted small">Creamos la joya de tus sueños a medida.</p>
        </div>
    </div>
</section>





@endsection