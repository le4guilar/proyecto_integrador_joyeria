<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Nostros - Joyería ALBA</title>

    <!-- para ver en tiempo real los cambios-->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-transparent fixed-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon">
            </span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link px-3" href="/home"> 
                        ALBA
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Catalogo
                    </a>
                    <ul class="dropdown-menu">
                        <li> 
                            <a class="dropdown-item" href="#"> 
                                Coleccion de Noche 
                            </a>
                        </li>

                        <li> 
                            <a class="dropdown-item" href="#">
                                Coleccion de dia
                            </a>
                        </li>
                    
                        <li>
                            <hr class="dropdown-divider"> 
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
                        Términos de uso
                    </a>
                </li>
                        
                <li class="nav-item">
                    <a class="nav-link px-3" href="/consulta"> 
                        Consultas
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

    <main class="nosotros-layout">
    <section class="intro-grid">
        <div class="col-titulo">
            <h1 class="display-about">SOBRE<br>NOSOTROS</h1>
        </div>
        <div class="col-intro-text">
            <p>
                Desde este año, <strong>ALBA</strong> ha abierto sus puertas con la misión fundamental de perfeccionar cada momento especial y emotivo en la vida de nuestros usuarios.
            </p>
        </div>
    </section>

    <section class="content-grid">
        <div class="col-details-text">
            <p>Nacimos con metas claras y el sueño persistente de crecer junto a nuestros clientes, basándonos siempre en los pilares innegociables de la calidad y la confianza.</p>
            
            <p>Entendemos que una joya es más que un simple accesorio; es una inversión emocional y un símbolo de distinción. Por esta razón, ALBA posee diseños que dan libertad.</p>
            
            <p>Priorizamos la mejor experiencia de usuario, asegurando que nuestra gente esté siempre lista para responder a todas las dudas con la mayor claridad y eficiencia.</p>
            
        </div>

        <div class="col-image-single">
            <img src="{{ asset('img/Nosotros.png') }}" alt="Colección Alba" class="imagen-nosotros-compuesta">
        </div>
    </section>
</main>
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