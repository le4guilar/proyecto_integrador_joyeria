@extends('plantilla-principal')
@section('contenido')




<div class="text-center mb-5 mt-5">
    <h6 class="text-uppercase mb-3" style="letter-spacing: 4px; color: #300403; font-weight: 600;">ALBA </h6>
    <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Términos de Uso</h2>
    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
</div>





<div class="container py-5">


    <div class="accordion shadow-sm" id="accordionTerminos">

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#item1">
                    1. Información sobre Productos y Materiales
                </button>
            </h2>
            <div id="item1" class="accordion-collapse collapse show" data-bs-parent="#accordionTerminos">
                <div class="accordion-body">
                    <p>En <strong>ALBA</strong>, nos esforzamos por representar con la mayor precisión posible los colores y detalles de nuestras joyas. Sin embargo, el cliente debe entender que:</p>
                    <ul>
                        <li>Las pantallas de los dispositivos pueden alterar la percepción de los colores y texturas de los metales.</li>
                        <li>Trabajamos con materiales nobles como <strong>Plata 925, Oro y Acero Quirúrgico 316L</strong>. Al ser procesos en parte artesanales, pueden existir variaciones milimétricas entre piezas de un mismo modelo.</li>
                        <li>La disponibilidad de los productos está sujeta a stock. En caso de una compra de un artículo sin stock, se ofrecerá el cambio por otro producto o el reembolso total del dinero.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item2">
                    2. Proceso de Pago y Seguridad Financiera
                </button>
            </h2>
            <div id="item2" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                <div class="accordion-body">
                    <p>Todas las transacciones realizadas en nuestro sitio son procesadas a través de plataformas de pago seguras y encriptadas.</p>
                    <ul>
                        <li><strong>Medios de Pago:</strong> Aceptamos tarjetas de crédito y débito de las principales emisoras, así como transferencias bancarias directas.</li>
                        <li><strong>Confirmación:</strong> El pedido comenzará a procesarse una vez que el pago haya sido validado y acreditado por la entidad correspondiente.</li>
                        <li><strong>Promociones:</strong> Los descuentos exclusivos por transferencia bancaria (10% OFF) no son acumulables con promociones de "Cuotas sin interés" u otros cupones de descuento vigentes, a menos que se especifique lo contrario.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item3">
                    3. Logística, Tiempos y Entrega de Pedidos
                </button>
            </h2>
            <div id="item3" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                <div class="accordion-body">
                    <p>La logística de <strong>ALBA</strong> está diseñada para proteger la seguridad de tu inversión:</p>
                    <ul>
                        <li><strong>Plazos:</strong> El tiempo estimado de entrega es de <strong>5 a 10 días hábiles</strong>. Este tiempo incluye el proceso de preparación, embalaje y tránsito del correo.</li>
                        <li><strong>Seguimiento:</strong> Una vez despachado, el cliente recibirá un código de seguimiento por correo electrónico para monitorear su paquete en tiempo real.</li>
                        <li><strong>Responsabilidad:</strong> ALBA no se responsabiliza por retrasos causados por direcciones de entrega incorrectas o incompletas proporcionadas por el usuario. En caso de que el paquete regrese a origen por estos motivos, el nuevo envío correrá por cuenta del comprador.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item4">
                    4. Garantía de Calidad y Política de Cambios
                </button>
            </h2>
            <div id="item4" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                <div class="accordion-body">
                    <p>Respaldamos la calidad de cada una de nuestras piezas con una garantía por defectos de fabricación de <strong>30 días corridos</strong> desde la recepción.</p>
                    <ul>
                        <li><strong>Cobertura:</strong> Fallas en cierres, soldaduras o engarces de piedras.</li>
                        <li><strong>Exclusiones:</strong> No cubrimos daños derivados del mal uso, tales como roturas por tirones, rayaduras profundas por contacto con superficies ásperas, o manchas causadas por perfumes, cremas o cloro.</li>
                        <li><strong>Procedimiento:</strong> Para iniciar un reclamo, el cliente deberá presentar el comprobante de compra y fotos nítidas del desperfecto a través de nuestro soporte de WhatsApp o correo oficial.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item5">
                    5. Protección de Datos y Privacidad
                </button>
            </h2>
            <div id="item5" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                <div class="accordion-body">
                    <p>En cumplimiento con las normativas de protección de datos personales, <strong>ALBA</strong> garantiza que la información recolectada (nombre, dirección, email) se utiliza únicamente para:</p>
                    <ol>
                        <li>Gestionar y enviar sus pedidos de forma eficiente.</li>
                        <li>Enviar comunicaciones sobre el estado de su compra.</li>
                        <li>Informar sobre novedades y promociones exclusivas (solo si el cliente ha dado su consentimiento).</li>
                    </ol>
                    <p>Nunca compartiremos sus datos con terceros con fines comerciales ajenos a la operación de nuestra tienda.</p>
                </div>
            </div>
        </div>

    </div>
</div>




<hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">




@endsection