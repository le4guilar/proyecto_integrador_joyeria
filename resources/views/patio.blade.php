<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/estiloHome.css') }}">

    <title>Joyería ALBA</title>
</head>

<body>
    <!--Barra de Navegacion: se cambio el color y se agrego el tutulo al costado-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-transparent fixed-top">

    <!--botones-->   
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon">
            </span>
         </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link px-3" href="/home"> 
                         INICIO
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Catalogo
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="#"> 
                            Coleccion de Noche 
                            </a>
                        </li>

                        <li> <a class="dropdown-item" href="#">
                            Coleccion de dia
                            </a>
                        </li>
                    
                        <li> <hr class="dropdown-divider"> 
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3" href="/nosotros"> 
                        Nosotros
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link px-3" href="/comercializacion"> 
                        Comercializacion
                    </a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link px-3" href="/terminos de uso"> 
                        Termino de uso
                    </a>
                </li>
                        
                <li class="nav-item">
                    <a class="nav-link px-3" href="/consultas"> 
                        Consulta
                    </a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link px-3" href="/contacto">
                        Contacto
                    </a>
                </li>
            </ul>
        </div>
    </nav>

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
                <a href="/productos/anillos">
                    <img src="{{asset('img/anillos.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Anillos">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="card-title m-0"> Anillos </h4>
                    </div>
                </a>
            </div>
         

            <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
                <a href="/productos/aretes">
                    <img src="{{asset('img/aretes.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Aretes">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="card-title m-0"> Aretes</h4>
                    </div>
                </a>
            </div>
                    
            <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
                <a href="/productos/pulseras">
                    <img src="{{asset('img/pulseras.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Pulseras">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="card-title m-0">Pulseras</h4>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
                <a href="/productos/collares">
                    <img src="{{asset('img/collares.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Collares">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="card-title m-0"> Collares </h4>
                   </div>
                </a>
            </div>
        </div>
    </section>

                <!--TENDENCIA-->
    <section class="container-fluid p-0 my-5">
        <div id="carruselTendencia" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                 <div class="carousel-item active">
                    <img src="{{ asset('img/tendenciaNoche.jpeg')}}" class="d-block w-100" alt="TENDENCIA">
                    <div class="carousel-caption text-center text-md-start" style="bottom: 10%; left: 5%; right: 5%;">
                        <h2 class="display-4 fw-bold text-capitalize"> 
                            Colección de Noche 
                        </h2>
                        <p class="lead w-50">
                            Texto para la tendencia.
                        </p>
                        <a href="#" class="btn btn-light btn-lg rounded-pill px-4 mt-3">
                            Descubrir→
                            </a>
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

    <footer class="bg-joyeria-footer pt-5 pb-4 container-fluid">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start">
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h2 class="text-uppercase mb-4 font-weight-bold">ALBA</h2>
                    <div class="mb-5">
                        <img class=mx-3 src="{{ asset('img/iconos/instagram.svg') }}" alt="Instagram" width="30">
                        <img class=mx-3 src="{{ asset('img/iconos/facebook.svg') }}" alt="Facebook" width="30">
                        <img class=mx-3 src="{{ asset('img/iconos/whatsapp.svg') }}" alt="Whatsapp" width="30">
                        <img class=mx-3 src="{{ asset('img/iconos/pinterest.svg') }}" alt="Pinterest" width="30">
                    </div>
                    <div class="ratio ratio-16x9 d-flex justify-content-center w-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.0599868541813!2d-58.83366463041629!3d-27.46739177439004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d11ee93d%3A0x597626256826f00a!2s9%20de%20Julio%201449%2C%20W3400%20Corrientes!5e0!3m2!1ses-419!2sar!4v1776745034502!5m2!1ses-419!2sar" width="500" height="250" style="border-radius:5px;" loading="lazy"></iframe>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Sobre nosotros</h5>
                    <p>
                        <a href="/nosotros" class="enlace" style="text-decoration: none;">Nosotros</a>
                    </p>
                    <p>
                        <a href="/contacto" class="enlace" style="text-decoration: none;">Contacto</a>
                    </p>
                    <p>
                        <a href="/terminos" class="enlace" style="text-decoration: none;">Términos y uso</a>
                    </p>
                </div>

                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Comercialización</h5>
                    <div class="mt-4">
                        <p class="formas-pago">
                            Formas de pago:
                        </p>
                        <img src="{{ asset('img/iconos/visa.svg') }}" alt="Visa" width="40" class="me-2">
                        <img src="{{ asset('img/iconos/mastercard.svg') }}" alt="Mastercard" width="40" class="me-2 bg-transparent">
                        <img src="{{ asset('img/iconos/mercado-pago.svg') }}" alt="Mercado Pago" width="40" class="me-2">
                        <img src="{{ asset('img/iconos/cash.svg') }}" alt="Efectivo" width="40" class="me-2 ">
                    </div>
                </div>
            </div>
        </div>
    </footer>






            <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            </body>
            </html>


