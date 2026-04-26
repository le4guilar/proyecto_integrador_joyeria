@extends('plantilla-principal')

@section('contenido')


<div class="text-center mb-5 mt-5">
    <h6 class="text-uppercase mb-3" style="letter-spacing: 4px; color: #300403; font-weight: 600;">ALBA </h6>
    <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Comercialización</h2>
    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
</div>


<div class="container my-5 w-100">
    <div class="row gx-5 justify-content-center">

        <div class="col-12 col-md-6 mt-2">
            <div class="p-4 rounded h-100 comercializacion-card">
                <h4 class="mb-4 h4-comercializacion">Envíos y Entregas</h4>
                <div class="mb-4">
                    <h6 class="fw-bold h6-comercializacion text-uppercase small">Envío Asegurado a domicilio</h6>
                    <p class="text-muted small p-comercializacion ">
                        Realizamos envíos a todo el país a través de logística especializada. Cada pieza viaja con seguro total.
                    </p>
                </div>
                <div class="mb-4">
                    <h6 class="fw-bold h6-comercializacion text-uppercase small">Retiro en Showroom</h6>
                    <p class="text-muted small p-comercializacion">
                        Podés retirar tu compra de forma gratuita en nuestra sucursal central.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 mt-2">
            <div class="p-4 rounded h-100 comercializacion-card">
                <h4 class="mb-4 h4-comercializacion">Formas de Pago</h4>
                <div class="mb-4">
                    <h6 class="fw-bold h6-comercializacion text-uppercase small">Tarjetas y Cuotas</h6>
                    <p class="text-muted small p-comercializacion">
                        Aceptamos todas las tarjetas de crédito. Consultá por promociones de hasta 6 cuotas sin interés.
                    </p>
                </div>
                <div class="mb-4">
                    <h6 class="fw-bold h6-comercializacion text-uppercase small">Transferencia Bancaria</h6>
                    <p class="text-muted small p-comercializacion">
                        Ofrecemos un 10% de descuento adicional para pagos mediante transferencia bancaria.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>






<div class="mt-5 p-5 text-center">
    <h4 class="mb-3 h4-comercializacion">Información de interés</h4>
    <p class="text-muted mx-auto p-comercializacion">
        Todas nuestras piezas se entregan en estuche de lujo con su correspondiente certificado de autenticidad.
    </p>
</div>



<div class="text-center mb-5 mt-5">
    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
    <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Consultas</h2>
    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
</div>

<div class="container mt-5">
    <div class="card p-4 rounded-2 card-consultas">
        <div class="accordion accordion-flush bg-transparent" id="accordionFAQ">
            <div class="accordion-item rounded-2 mb-3">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <span>Compras :</span>
                    </button>
                </h3>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <ul class="list-unstyled mb-0 mt-3 text-start">
                            <li class="mb-2">
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

            <div class="accordion-item rounded-2 mb-3">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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

            <div class="accordion-item rounded-2 mb-3">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
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

            <div class="accordion-item rounded-2 mb-3">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
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

            <div class="accordion-item rounded-2 mb-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
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
<hr class="mx-auto mt-5" style="width: 60px; opacity: 0.2; color: #300403;">

@endsection