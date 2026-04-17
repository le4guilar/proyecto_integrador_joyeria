<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>Joyería</title>

    <style>
        body{
            background-color: #dfdada !important;
            color: white !important;
        }
        .navbar{
            background-color transparent;
        }

        /*estilo de la coleccion*/
        .cat-img {
        height: 250px; /* ajusta la altura*/
        object-fit: cover; /* esto es para que la imagen no se deforme */
        transition: transform 0.3s ease; /* Prepara la animación?? */
        }
    
        .cat-card:hover .cat-img {
        transform: scale(1.05); /* Agranda un poquito la imagen al pasar el mouse */
        }
    
        .cat-card .card {
        border-radius: 10px; /* muestras bordes redondeados  */
        }


    </style>




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
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/contacto">
                        Contacto
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <!--Lean

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Joyeria</a>
                <div class="navbar-nav">
                    <a class="nav-link" href="/home">Home</a>
                    <a class="nav-link active" href="/productos">Productos</a>
                    <a class="nav-link" href="/contacto">Contacto</a>
                    <a class="nav-link" href="/nosotros">Nosotros</a>
                </div>
            </div>
    </nav>
    -->

    <!--Primera parte del carrusel-->
<div id="carruselJoyeria" class="carousel slide" data-bs-ride="carousel">
        
        <!--
        <div class="carousel-indicators">
            <button type="button" data-bs-target="·carruselJoyeria" data-bs-slide-to="0" class="active" aria-current="true">
            </button>
            <button type="button" data-bs-target="·carruselJoyeria" data-bs-slide-to="1">
            </button>
        </div>
        -->

        <!--Insersion de imagenes-->
    <div class="carousel-inner">
            
            <div class="carousel-item active">
                <img src="{{ asset('img/Coleccion-de-noche.png') }}" class="d-block w-50" alt="Coleccion de Noche">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/Principal.png') }}" class="d-block w-50" alt="Principal">
            </div>

        </div> <button class="carousel-control-prev" type="button" data-bs-target="#carruselJoyeria" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carruselJoyeria" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
        <!--Fin de insersion-->
    
    </div> <div class="fixed-bottom p-5 text-end" style="pointer-events: none;">
        <h1 style="font-family: 'Cormorant Garamond', serif; font-size: 8rem; letter-spacing: 15px; opacity: 1; color: white; margin: 0;">
            ALBA
        </h1>
    </div>
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
        <div class="row g-4">
            <div class="col-6 col-md-3">
                <a href="/productos/anillos" class="text-decoration-none cat-card">
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <img src="{{asset('img/anillos.jpeg')}}" class="card-img-top cat-img" alt="Anillos">
                        <div class="card-body text center bg-white">
                            <h5 class="card-title text-darfw-semibold m-0">
                                Anillos
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3">
                <a href="/productos/aretes" class="text-decoration-none cat-card">
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <img src="{{asset('img/aretes.jpeg')}}" class="card-img-top cat-img" alt="Aretes">
                        <div class="card-body text center bg-white">
                            <h5 class="card-title text-darfw-semibold m-0">
                                Aretes
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-6 col-md-3">
                <a href="/productos/pulseras" class="text-decoration-none cat-card">
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <img src="{{asset('img/pulseras.jpeg')}}" class="card-img-top cat-img" alt="Pulseras">
                        <div class="card-body text center bg-white">
                            <h5 class="card-title text-darfw-semibold m-0">
                                Pulseras
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3">
                <a href="/productos/collares" class="text-decoration-none cat-card">
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <img src="{{asset('img/collares.jpeg')}}" class="card-img-top cat-img" alt="Collares">
                        <div class="card-body text center bg-white">
                            <h5 class="card-title text-darfw-semibold m-0">
                                Collares
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

        <!--TENDENCIA-->
        <section class="container-fluid p-0 my-5">
            <div id-="carruselTendencia" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/tendenciaNoche.jpeg')}}" class="d-block w-100" style="height: 500px; object-fit:cover; filter: brightness(70%):" alt="TENDENCIA">
                        <div class="carousel-caption d-none d-md-block text-start" style="bottom: 20%; left:10%;">
                            <h2 clas="display-4 fw-bold text-uppercase"> 
                                Colección de Noche 
                            </h2>
                            <p class="lead w-50">
                                Texto para la tendencia.
                            </p>
                            <a href="#" class="btn btn-light btn-lg rounded-pill px4 mt-3">
                                Describir -> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>





    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
    </html>


