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
    <title>Comercialización - Joyería ALBA</title>
</head>
<body>
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
                        Comercialización
                    </a>
                </li>            
                <li class="nav-item">
                    <a class="nav-link px-3" href="/terminos-de-uso"> 
                        Términos de uso
                    </a>
                </li>                        
                <li class="nav-item">
                    <a class="nav-link px-3" href="/consulta"> 
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
    <main class="container my-5 py-5">
        <div class="text-center mb-5 mt-5">
            <h6 class="text-uppercase mb-3" style="letter-spacing: 4px; color: #300403; font-weight: 600;">Servicios</h6>
            <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Comercialización</h2>
            <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
        </div>

        <div class="row g-5">
            <div class="col-md-6">
                <h4 style="font-family: 'Cormorant Garamond', serif;" class="mb-4">Envíos y Entregas</h4>
                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase small">Envío Asegurado a domicilio</h6>
                    <p class="text-muted small">Realizamos envíos a todo el país a través de logística especializada. Cada pieza viaja con seguro total.</p>
                </div>
                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase small">Retiro en Showroom</h6>
                    <p class="text-muted small">Podés retirar tu compra de forma gratuita en nuestra sucursal central.</p>
                </div>
            </div>

            <div class="col-md-6">
                <h4 style="font-family: 'Cormorant Garamond', serif;" class="mb-4">Formas de Pago</h4>
                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase small">Tarjetas y Cuotas</h6>
                    <p class="text-muted small">Aceptamos todas las tarjetas de crédito. Consultá por promociones de hasta 6 cuotas sin interés.</p>
                </div>
                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase small">Transferencia Bancaria</h6>
                    <p class="text-muted small">Ofrecemos un 10% de descuento adicional para pagos mediante transferencia bancaria.</p>
                </div>
            </div>
        </div>

        <div class="mt-5 p-5 text-center" style="background-color: #f8f5f2; border-radius: 5px;">
            <h4 style="font-family: 'Cormorant Garamond', serif;" class="mb-3">Información de interés</h4>
            <p class="text-muted mx-auto small" style="max-width: 700px;">
                Todas nuestras piezas se entregan en estuche de lujo con su correspondiente certificado de autenticidad. 
            </p>
        </div>
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


