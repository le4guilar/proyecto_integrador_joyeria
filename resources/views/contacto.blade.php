<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Joyería</title>
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
            <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Contacto</h2>
            <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
        </div>

        <div class="container mt-5">
            <div class="card p-4 border rounded-2 shadow-sm">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="apellido">
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="tel" class="form-control" id="telefono">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="consulta" class="form-label">Consulta:</label>
                        <textarea class="form-control" id="consulta" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </form>
            </div>
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