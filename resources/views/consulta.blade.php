<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <main class="bg-joyeria-main text-center py-5 w-100">
        <h1 class="text-center mb-4 mt-4">Preguntas Frecuentes:</h1>
        <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">

        <div class="container mt-5">
            <div class="card p-4 border rounded-2 shadow-sm acordeon-alba">      
                <div class="accordion accordion-flush" id="accordionFAQ">
                    <div class="accordion-item border rounded-2 mb-3">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span>Compras :</span>
                            </button>
                        </h3>
                        
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body text-muted pt-0 ps-5">
                                <ul class="list-unstyled mb-0 mt-3 text-start">
                                    <li class="mb-2">
                                        <span class="ms-3 h5 fw-bold">¿Cómo pido una joya personalizada?</span><br> 
                                            Nos contactás por WhatsApp, nos contás tu idea, diseñamos la pieza juntos y te pasamos el presupuesto.
                                     </li>
                                    <li class="mb-2">
                                    <span class="ms-3 h5 fw-bold">¿Qué métodos de pago aceptan? </span><br> 
                                        Aceptamos transferencias bancarias, tarjetas de crédito/débito y Mercado Pago.
                                    </li>
                                    <li>
                                        <span class="ms-3 h5 fw-bold">¿Puedo modificar un pedido después de pagarlo?</span> <br>
                                            Solo dentro de las primeras 24 horas en joyas de catálogo. Las piezas personalizadas no admiten cambios una vez iniciada la fabricación.
                                    </li>
                                    <li>
                                        <span class="ms-3 h5 fw-bold">¿Cuánto demoran en hacer una joya a medida?</span> <br>
                                            El proceso completo de diseño y fabricación artesanal toma entre 10 y 15 días hábiles.
                                    </li>
                                    <li>
                                        <span class="ms-3 h5 fw-bold">¿Tienen local físico?</span> <br>
                                        Tenemos un Showroom en la Ciudad de Corrientes aunque mayormente trabajamos online, pero te enviamos fotos y videos en alta calidad de cada etapa de tu joya.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

            <div class="accordion-item border rounded-2 mb-3">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span>Envío y Entrega :</span>
                    </button>
                </h3>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <ul class="list-unstyled mb-0 mt-3 text-start">
                            <li class="mb-2">
                                <span class="ms-3 h5 fw-bold">¿A dónde envían y por qué medios?</span> <br> 
                                Hacemos envíos a todo el país a través de OCA, Andreani y Correo Argentino. También hacemos envíos internacionales a través de FedEx.
                            </li>
                            <li class="mb-2">
                                <span class="ms-3 h5 fw-bold">¿Cómo protegen la joya durante el viaje?</span> <br> 
                                Van embaladas de forma segura dentro de nuestros estuches rígidos personalizados, diseñados para absorber cualquier golpe.
                            </li>
                            <li>
                                <span class="ms-3 h5 fw-bold">¿Cómo sé dónde está mi paquete?</span> <br>
                                Al despachar tu compra, te enviamos por mail un código de seguimiento para que rastrees el pedido en tiempo real.
                            </li>
                            <li>
                                <span class="ms-3 h5 fw-bold">¿Cuánto tarda en llegar?</span> <br>
                                Depende de la provincia o país y el transporte elegido, pero suele demorar entre 3 y 7 días hábiles desde el despacho.
                            </li>
                            <li>
                                <span class="ms-3 h5 fw-bold">¿Qué pasa si el correo pierde mi paquete?</span> <br>
                                Todos nuestros envíos cuentan con seguro. Si algo pasa, nos hacemos cargo y te enviamos una nueva pieza o te reintegramos el dinero.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item border rounded-2 mb-3">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span>Materiales :</span>
                    </button>
                </h3>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <ul class="list-unstyled mb-0 mt-3 text-start">
                            <li class="mb-2">
                                <span class="ms-3 h5 fw-bold">¿De qué materiales están hechas las joyas?</span> <br> 
                                Trabajamos exclusivamente con metales nobles y genuinos: oro 18k, plata 925 y platino.
                            </li>
                            <li class="mb-2">
                                <span class="ms-3 h5 fw-bold">¿Las joyas tienen garantía?</span> <br> 
                                Sí, todas las piezas se entregan con un certificado de autenticidad impreso que garantiza la pureza del metal utilizado.
                            </li>
                            <li>
                                <span class="ms-3 h5 fw-bold">¿Pueden fundir oro viejo que yo tenga?</span> <br>
                                Sí, podés enviarnos tus joyas antiguas de oro o plata y las fundimos para crear un nuevo diseño a medida, descontando el valor del material.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item border rounded-2 mb-3">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <span>Cuidado y Mantenimiento :</span>
                    </button>
                </h3>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <ul class="list-unstyled mb-0 mt-3 text-start">
                            <li class="mb-2">
                                <span class="ms-3 h5 fw-bold">¿Cómo limpio mis joyas en casa?</span> <br> 
                                Usá agua tibia, jabón neutro y un cepillo de cerdas muy suaves. Después, secalas bien con un paño de microfibra.
                            </li>
                            <li class="mb-2">
                                <span class="ms-3 h5 fw-bold">¿Qué cosas pueden dañar el metal?</span> <br> 
                                Evitá el contacto directo con perfumes, cloro de pileta, lavandina y cremas. Recomendamos quitártelas para hacer deporte o bañarte.
                            </li>
                            <li>
                                <span class="ms-3 h5 fw-bold">¿Hacen mantenimiento de las piezas?</span> <br>
                                Sí, ofrecemos un servicio de pulido y limpieza profunda. Para los clientes, el primer mantenimiento anual es sin cargo.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item border rounded-2 mb-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <span>Devoluciones :</span>
                    </button>
                </h3>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <ul class="list-unstyled mb-0 mt-3 text-start">
                            <li class="mb-2">
                                <span class="ms-3 h5 fw-bold">¿Puedo cambiar o devolver una joya de catálogo? </span><br> 
                                Sí, tenés 10 días corridos desde que la recibís, siempre y cuando esté sin uso y en su estuche original.
                            </li>
                            <li class="mb-2">
                                <span class="ms-3 h5 fw-bold">¿Las joyas personalizadas tienen devolución?</span> <br> 
                                No. Al ser piezas únicas creadas a medida y gusto exclusivo del cliente, no admiten cambios ni devoluciones.
                            </li>
                            <li>
                                <span class="ms-3 h5 fw-bold">¿Quién paga el envío en caso de un cambio?</span> <br>
                                Si el cambio es por un defecto de fabricación, el envío corre por nuestra cuenta. Si es por cambio de talle o modelo, lo abona el cliente.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div> 
    </div> 
    </div>
    <hr class="mx-auto mt-5" style="width: 60px; opacity: 0.2; color: #300403;">

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