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

        /*la barra de navegacion es transparente y flota sobre el carrusel*/
        .navbar{
            background-color: transparent;
        }

        
        /* ESTILO NUEVO PARA CATEGORIAS*/
        .cat-item {
            position: relative;
            overflow: hidden;
            height: 600px; /* esto les da la altura lujosa */
            background-color: #000;
        }

        .cat-full-img {
            width: 100% !important;
            height: 600px !important;
            object-fit: cover !important; /* Fundamental para que no se deformen */
            transition: transform 0.5s ease; /* Para que el zoom sea suave */
        }

        /* Efecto de zoom al pasar el mouse */
        .cat-item:hover .cat-full-img {
            transform: scale(1.1);
        }

        /* El degradado para que el texto se lea bien */
        .cat-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 50%) !important;
            height: 100%;
            width: 100%;
            z-index: 2;
            pointer-events: none; /* Para que el clic pase a la imagen/link */
        }

        /* Estilo del texto (Nombres de las joyas) */
        .cat-overlay h4 {
            text-transform: none !important;
            color: white !important;
            font-size: 1.8rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 500;
            letter-spacing: 2px;
            margin-bottom: 20px !important;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        

        /*estilo de la tendencia*/
        .carousel-item img{
            height: 500px;
            object-fit: cover;
            filter: brightness(70%);
        }

        .titulo-tendencia{
            background-color: #ffd7a9 !important;
            padding: 40px 0;
            text-align: center;
            letter-spacing: 20px;
            color: #300403;
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
            
                <li class="nav-item">
                    <a class="nav-link px-3" href="/contacto">
                        Contacto
                    </a>
                </li>
            </ul>
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
            
 
    <div class="fixed-bottom p-5 text-end" style="pointer-events: none;">
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
        <div class="row g-0">
            <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
                <a href="/productos/anillos">
                    <img src="{{asset('img/anillos.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Anillos">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="text-white fw-bold m-0 text-uppercase"> Anillos </h4>
                    </div>
                </a>
            </div>
         

            <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
                <a href="/productos/aretes">
                    <img src="{{asset('img/aretes.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Aretes">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="text-white fw-bold m-0 text-uppercase"> Aretes</h4>
                    </div>
                </a>
            </div>
                    
            <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
                <a href="/productos/pulseras">
                    <img src="{{asset('img/pulseras.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Pulseras">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="text-white fw-bold m-0 text-uppercase">Pulseras</h4>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3 position-relative overflow-hidden cat-item">
                <a href="/productos/collares">
                    <img src="{{asset('img/collares.jpeg')}}" class="img-fluid w-100 cat-full-img" alt="Collares">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 d-flex align-items-end cat-overlay">
                        <h4 class="text-white fw-bold m-0 text-uppercase"> Collares </h4>
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
                        <h2 class="display-4 fw-bold text-uppercase"> 
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


            <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            </body>
            </html>


