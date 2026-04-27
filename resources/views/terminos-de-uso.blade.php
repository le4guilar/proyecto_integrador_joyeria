@extends('plantilla-principal')
@section('contenido')

<div class="text-center mb-5 mt-5">
    <h6 class="text-uppercase mb-3" style="letter-spacing: 4px; color: #300403; font-weight: 600;">ALBA </h6>
    <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Términos de Uso</h2>
    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
</div>

<div class="container mt-5">
    <div class="card p-4 rounded-2 card-consultas">
        <div class="accordion accordion-flush bg-transparent" id="accordionFAQ">
            <div class="accordion-item rounded-2 mb-3 border-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        1. Información sobre Productos y Materiales :
                    </button>
                </h3>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <p class="mt-4">En <strong>ALBA</strong>, nos esforzamos por representar con la mayor precisión posible los colores y detalles de nuestras joyas. Sin embargo, el cliente debe entender que:</p>
                        <ul>
                            <li>Las pantallas de los dispositivos pueden alterar la percepción de los colores y texturas de los metales.</li>
                            <li>Trabajamos con materiales nobles como <strong>Plata 925, Oro y Acero Quirúrgico 316L</strong>. Al ser procesos en parte artesanales, pueden existir variaciones milimétricas entre piezas de un mismo modelo.</li>
                            <li>La disponibilidad de los productos está sujeta a stock. En caso de una compra de un artículo sin stock, se ofrecerá el cambio por otro producto o el reembolso total del dinero.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item rounded-2 mb-3 border-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span>2. Proceso de Pago y Seguridad Financiera :</span>
                    </button>
                </h3>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <p class="mt-4">Todas las transacciones realizadas en nuestro sitio son procesadas a través de plataformas de pago seguras y encriptadas.</p>
                        <ul>
                            <li><strong>Medios de Pago:</strong> Aceptamos tarjetas de crédito y débito de las principales emisoras, así como transferencias bancarias directas.</li>
                            <li><strong>Confirmación:</strong> El pedido comenzará a procesarse una vez que el pago haya sido validado y acreditado por la entidad correspondiente.</li>
                            <li><strong>Promociones:</strong> Los descuentos exclusivos por transferencia bancaria (10% OFF) no son acumulables con promociones de "Cuotas sin interés" u otros cupones de descuento vigentes, a menos que se especifique lo contrario.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item rounded-2 mb-3 border-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span>3. Logística, Tiempos y Entrega de Pedidos :</span>
                    </button>
                </h3>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <p class="mt-4">La logística de <strong>ALBA</strong> está diseñada para proteger la seguridad de tu inversión:</p>
                        <ul>
                            <li><strong>Plazos:</strong> El tiempo estimado de entrega es de <strong>5 a 10 días hábiles</strong>. Este tiempo incluye el proceso de preparación, embalaje y tránsito del correo.</li>
                            <li><strong>Seguimiento:</strong> Una vez despachado, el cliente recibirá un código de seguimiento por correo electrónico para monitorear su paquete en tiempo real.</li>
                            <li><strong>Responsabilidad:</strong> ALBA no se responsabiliza por retrasos causados por direcciones de entrega incorrectas o incompletas proporcionadas por el usuario. En caso de que el paquete regrese a origen por estos motivos, el nuevo envío correrá por cuenta del comprador.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item rounded-2 mb-3 border-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <span>4. Garantía de Calidad y Política de Cambios :</span>
                    </button>
                </h3>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <p class="mt-4">Respaldamos la calidad de cada una de nuestras piezas con una garantía por defectos de fabricación de <strong>30 días corridos</strong> desde la recepción.</p>
                        <ul>
                            <li><strong>Cobertura:</strong> Fallas en cierres, soldaduras o engarces de piedras.</li>
                            <li><strong>Exclusiones:</strong> No cubrimos daños derivados del mal uso, tales como roturas por tirones, rayaduras profundas por contacto con superficies ásperas, o manchas causadas por perfumes, cremas o cloro.</li>
                            <li><strong>Procedimiento:</strong> Para iniciar un reclamo, el cliente deberá presentar el comprobante de compra y fotos nítidas del desperfecto a través de nuestro soporte de WhatsApp o correo oficial.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item rounded-2 mb-0 border-0">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100 p-3 rounded-2 bg-boton-consulta fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <span>5. Protección de Datos y Privacidad :</span>
                    </button>
                </h3>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body text-muted pt-0 ps-5">
                        <p class="mt-4">En cumplimiento con las normativas de protección de datos personales, <strong>ALBA</strong> garantiza que la información recolectada (nombre, dirección, email) se utiliza únicamente para:</p>
                        <ol>
                            <li>Gestionar y enviar sus pedidos de forma eficiente.</li>
                            <li>Enviar comunicaciones sobre el estado de su compra.</li>
                            <li>Informar sobre novedades y promociones exclusivas (solo si el cliente ha dado su consentimiento).</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>





</div>




<hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">




@endsection