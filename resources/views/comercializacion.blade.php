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

<hr class="mx-auto my-5" style="width: 60px; opacity: 0.2; color: #300403;">

@endsection

