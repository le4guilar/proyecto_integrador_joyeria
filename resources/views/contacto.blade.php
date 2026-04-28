@extends('plantilla-principal')

@section('contenido')


<div class="text-center mb-5 mt-5">
    <h6 class="text-uppercase mb-3" style="letter-spacing: 4px; color: #300403; font-weight: 600;">ALBA </h6>
    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
    <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Consultas</h2>
    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
</div>

<div class="container mt-5">
    <div class="card p-4 rounded-2 card-consultas">
        <div class="accordion accordion-flush bg-transparent" id="accordionFAQ">
            <div class="accordion-item rounded-2 mb-3 border-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed item-terminos d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Compras :
                    </button>
                </h3>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <ul class="list-unstyled mb-0 mt-3 text-start">
                            <li class="mb-2 li-font">
                                <span class="ms-3 fw-bold">¿Cómo pido una joya personalizada?</span><br>
                                Nos contactás por WhatsApp, nos contás tu idea, diseñamos la pieza juntos y te pasamos el presupuesto.
                            </li>
                            <li class="mb-2">
                                <span class="ms-3 fw-bold">¿Qué métodos de pago aceptan? </span><br>
                                Aceptamos transferencias bancarias, tarjetas de crédito/débito y Mercado Pago.
                            </li>
                            <li>
                                <span class="ms-3 fw-bold">¿Puedo modificar un pedido después de pagarlo?</span> <br>
                                Solo dentro de las primeras 24 horas en joyas de catálogo. Las piezas personalizadas no admiten cambios una vez iniciada la fabricación.
                            </li>
                            <li>
                                <span class="ms-3 fw-bold">¿Cuánto demoran en hacer una joya a medida?</span> <br>
                                El proceso completo de diseño y fabricación artesanal toma entre 10 y 15 días hábiles.
                            </li>
                            <li>
                                <span class="ms-3 fw-bold">¿Tienen local físico?</span> <br>
                                Tenemos un Showroom en la Ciudad de Corrientes aunque mayormente trabajamos online, pero te enviamos fotos y videos en alta calidad de cada etapa de tu joya.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item rounded-2 mb-3 border-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed item-terminos d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span>Envío y Entrega :</span>
                    </button>
                </h3>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <ul class="list-unstyled mb-0 mt-3 text-start">
                            <li class="mb-2">
                                <span class="ms-3 fw-bold">¿A dónde envían y por qué medios?</span> <br>
                                Hacemos envíos a todo el país a través de OCA, Andreani y Correo Argentino. También hacemos envíos internacionales a través de FedEx.
                            </li>
                            <li class="mb-2">
                                <span class="ms-3 fw-bold">¿Cómo protegen la joya durante el viaje?</span> <br>
                                Van embaladas de forma segura dentro de nuestros estuches rígidos personalizados, diseñados para absorber cualquier golpe.
                            </li>
                            <li>
                                <span class="ms-3 fw-bold">¿Cómo sé dónde está mi paquete?</span> <br>
                                Al despachar tu compra, te enviamos por mail un código de seguimiento para que rastrees el pedido en tiempo real.
                            </li>
                            <li>
                                <span class="ms-3 fw-bold">¿Cuánto tarda en llegar?</span> <br>
                                Depende de la provincia o país y el transporte elegido, pero suele demorar entre 3 y 7 días hábiles desde el despacho.
                            </li>
                            <li>
                                <span class="ms-3 fw-bold">¿Qué pasa si el correo pierde mi paquete?</span> <br>
                                Todos nuestros envíos cuentan con seguro. Si algo pasa, nos hacemos cargo y te enviamos una nueva pieza o te reintegramos el dinero.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item rounded-2 mb-3 border-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed item-terminos d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span>Materiales :</span>
                    </button>
                </h3>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <ul class="list-unstyled mb-0 mt-3 text-start">
                            <li class="mb-2">
                                <span class="ms-3 fw-bold">¿De qué materiales están hechas las joyas?</span> <br>
                                Trabajamos exclusivamente con metales nobles y genuinos: oro 18k, plata 925 y platino.
                            </li>
                            <li class="mb-2">
                                <span class="ms-3 fw-bold">¿Las joyas tienen garantía?</span> <br>
                                Sí, todas las piezas se entregan con un certificado de autenticidad impreso que garantiza la pureza del metal utilizado.
                            </li>
                            <li>
                                <span class="ms-3 fw-bold">¿Pueden fundir oro viejo que yo tenga?</span> <br>
                                Sí, podés enviarnos tus joyas antiguas de oro o plata y las fundimos para crear un nuevo diseño a medida, descontando el valor del material.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item rounded-2 mb-3 border-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed item-terminos d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <span>Cuidado y Mantenimiento :</span>
                    </button>
                </h3>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <ul class="list-unstyled mb-0 mt-3 text-start">
                            <li class="mb-2">
                                <span class="ms-3 fw-bold">¿Cómo limpio mis joyas en casa?</span> <br>
                                Usá agua tibia, jabón neutro y un cepillo de cerdas muy suaves. Después, secalas bien con un paño de microfibra.
                            </li>
                            <li class="mb-2">
                                <span class="ms-3 fw-bold">¿Qué cosas pueden dañar el metal?</span> <br>
                                Evitá el contacto directo con perfumes, cloro de pileta, lavandina y cremas. Recomendamos quitártelas para hacer deporte o bañarte.
                            </li>
                            <li>
                                <span class="ms-3 fw-bold">¿Hacen mantenimiento de las piezas?</span> <br>
                                Sí, ofrecemos un servicio de pulido y limpieza profunda. Para los clientes, el primer mantenimiento anual es sin cargo.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item rounded-2 mb-0 border-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed item-terminos d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <span>Devoluciones :</span>
                    </button>
                </h3>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <ul class="list-unstyled mb-0 mt-3 text-start">
                            <li class="mb-2">
                                <span class="ms-3 fw-bold">¿Puedo cambiar o devolver una joya de catálogo? </span><br>
                                Sí, tenés 10 días corridos desde que la recibís, siempre y cuando esté sin uso y en su estuche original.
                            </li>
                            <li class="mb-2">
                                <span class="ms-3 fw-bold">¿Las joyas personalizadas tienen devolución?</span> <br>
                                No. Al ser piezas únicas creadas a medida y gusto exclusivo del cliente, no admiten cambios ni devoluciones.
                            </li>
                            <li>
                                <span class="ms-3 fw-bold">¿Quién paga el envío en caso de un cambio?</span> <br>
                                Si el cambio es por un defecto de fabricación, el envío corre por nuestra cuenta. Si es por cambio de talle o modelo, lo abona el cliente.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="text-center mb-3 mt-5">
    <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Contacto</h2>
    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
</div>

<div class="container py-5">
    <div class="row g-4">

        <div class="col-md-6">
            <div class="row g-3">

                <div class="col-6">
                    <a href="https://wa.me/543795112233" class="text-decoration-none text-reset" target="_blank">
                        <div class="rounded p-4 text-center h-100 d-flex flex-column align-items-center justify-content-center contacto-card">
                            <img class="img-fluid mb-2" src="{{ asset('img/contacto/whatsapp.svg') }}" alt="Whatsapp" width="60">
                            <h5 class="mt-4 h5-contacto">WhatsApp</h5>
                            <p class="mb-0 text-muted">+54 379 5112-233</p>
                        </div>
                    </a>
                </div>

                <div class="col-6">
                    <div class="rounded p-4 text-center h-100 d-flex flex-column align-items-center justify-content-center contacto-card">
                        <div class="d-flex justify-content-center gap-2 mb-2">
                            <a href="https://instagram.com/ALBA" class="text-reset" target="_blank">
                                <div class="border rounded p-2 border-0 d-flex align-items-center"><img class="img-fluid" src="{{ asset('img/contacto/instagram.svg') }}" alt="Instagram" width="40"></div>
                            </a>
                            <a href="https://facebook.com/ALBA" class="text-reset" target="_blank">
                                <div class="border rounded p-2 border-0 d-flex align-items-center"><img class="img-fluid" src="{{ asset('img/contacto/facebook.svg') }}" alt="Facebook" width="40"></div>
                            </a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="https://pinterest.com/ALBA" class="text-reset" target="_blank">
                                <div class="border rounded p-2 border-0 d-flex align-items-center"><img class="img-fluid" src="{{ asset('img/contacto/pinterest.svg') }}" alt="Pinterest" width="40"></div>
                            </a>
                        </div>
                        <h5 class="mt-4 h5-contacto">Redes Sociales</h5>
                    </div>
                </div>

                <div class="col-6">
                    <a href="mailto:info@alba.com" class="text-decoration-none text-reset">
                        <div class="rounded p-4 text-center h-100 d-flex flex-column align-items-center justify-content-center contacto-card">
                            <img class="img-fluid mb-2" src="{{ asset('img/contacto/envelope.svg') }}" alt="Correo" width="60">
                            <h5 class="mt-4 h5-contacto">Correo</h5>
                            <p class="mb-0 text-muted">info@alba.com</p>
                        </div>
                    </a>
                </div>

                <div class="col-6">
                    <a href="https://www.google.com/maps/search/?api=1&query=9+de+Julio+1449+Corrientes+Argentina" class="text-decoration-none text-reset" target="_blank">
                        <div class="rounded p-4 text-center h-100 d-flex flex-column align-items-center justify-content-center contacto-card">
                            <img class="img-fluid mb-2" src="{{ asset('img/contacto/shop.svg') }}" alt="Showroom" width="60">
                            <h5 class="mt-4 h5-contacto">Showroom</h5>
                            <p class="mb-0 text-muted">9 de Julio 1449, Corrientes</p>
                        </div>
                    </a>
                </div>

                <div class="col-12">
                    <div class="ratio ratio-16x9 border rounded overflow-hidden shadow-sm">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.0599868541813!2d-58.83366463041629!3d-27.46739177439004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d11ee93d%3A0x597626256826f00a!2s9%20de%20Julio%201449%2C%20W3400%20Corrientes!5e0!3m2!1ses-419!2sar!4v1776745034502!5m2!1ses-419!2sar" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="bg-joyeria-form border rounded p-5 h-100">
                <h2 class="text-center mb-4">Mandanos tu consulta</h2>

                <form action="{{ url('/contacto') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control bg-joyeria-input" placeholder="Nombre Apellido" value="{{ old('nombre') }}" required>
                        @error('nombre')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teléfono:</label>
                        <input type="tel" name="telefono" class="form-control bg-joyeria-input" placeholder="3794112233" value="{{ old('telefono') }}" required>
                        @error('telefono')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mail:</label>
                        <input type="email" name="email" class="form-control bg-joyeria-input" placeholder="correo@mail.com" value="{{ old('email') }}" required>
                        @error('email')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Mensaje:</label>
                        <textarea name="mensaje" class="form-control bg-joyeria-textarea" value="{{ old('mensaje') }}" required>
                        </textarea>
                        @error('mensaje')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-joyeria-enviar px-5 py-2 mt-0 mb-0 fix-b">
                            E N V I A R
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<hr class="mx-auto my-5" style="width: 60px; opacity: 0.2; color: #300403;">



@endsection