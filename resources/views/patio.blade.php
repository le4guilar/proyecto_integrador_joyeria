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

    <!-- Despues del carrusel-->
    <section class="container my-5 cat-seccion">
        <div class="text-center mb-5">
           <h2 class="fw-bold text-dark"> 
               Nuestra Colección
            </h2>
            <p class="text-muted">
                Elegancia en cada detalle
            </p>            
        </div>

            <!--columna de imagenes-->
        <div class="row g-0">
            <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
                <a href="/productos/anillos">
                    <img src="{{asset('img/anillos.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Anillos">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="font-family: 'Montserrat', sans-serif;" class="card-title text-dark fw-semibold m-0 fs-6"> Anillos </h4>
                    </div>
                </a>
            </div>
         

            <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
                <a href="/productos/aretes">
                    <img src="{{asset('img/aretes.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Aretes">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="font-family: 'Montserrat', sans-serif;" class="card-title text-dark fw-semibold m-0 fs-6"> Aretes</h4>
                    </div>
                </a>
            </div>
                    
            <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
                <a href="/productos/pulseras">
                    <img src="{{asset('img/pulseras.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Pulseras">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="font-family: 'Montserrat', sans-serif;" class="card-title text-dark fw-semibold m-0 fs-6">Pulseras</h4>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
                <a href="/productos/collares">
                    <img src="{{asset('img/collares.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Collares">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="font-family: 'Montserrat', sans-serif;" class="card-title text-dark fw-semibold m-0 fs-6"> Collares </h4>
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
                    <img src="{{ asset('img/tendenciaNoche.jpeg')}}" class="d-block w-100" style="height: 500px; object-fit:cover; filter: brightness(70%);" alt="TENDENCIA">
                    <div class="carousel-caption d-none d-md-block text-start" style="bottom: 20%; left:10%;">
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
                <i class="bi bi-gem fs-1"> <h5 class="fw-bold mt-3"> Calidad Certificada </5>
                <p class="text-muted small"> Diamantes y metales de la más alta pureza.</p>
            </div>

            <div class="col-md-4">
                <i class="bi bi-truck fs-1"> </i>
                <h5 class="fw-bold mt-3"> Envío Asegurado </5>
                <p class="text-muted small"> Llegamos a todo el país con la máxima seguridad.</p>
            </div>

            <div class="col-md-4">
                <i class="bi bi-pencil-square fs-1"> </i>
                <h5 class="fw-bold mt-3">Diseño Personalizado </5>
                <p class="text-muted small">Creamos la joya de tus sueños a medida.</p> 
            </div>
        </div>
    </section>






            <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            </body>
            </html>


