<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>Joyería</title>

    <style>
        body{
            background-color: #ddb88f !important;
            color: white !important;
        }
        .navbar{
            background-color transparent;
        }
    </style>

</head>
<body>
    <h1>Esto es el patio de pruebas</h1>

    <!--Barra de Navegacion: se cambio el color y se agrego el tutulo al costado-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#" style="letter-spacing: 2px;">
                ALBA
            </a>

         <!--botones-->   
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon">
            </span>
        </button>

        <div class="collapse nvbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link px-3" href="/home"> 
                        INICIO
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Productos
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

        <!--Barra de Navegacion-->

    
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
    </html>


