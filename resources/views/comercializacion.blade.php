@extends('plantilla-principal')

@section('contenido')


<div class="text-center mb-5 mt-5">
    <h6 class="text-uppercase mb-3" style="letter-spacing: 4px; color: #300403; font-weight: 600;">ALBA </h6>
    <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Comercialización</h2>
    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
</div>

<div class="row mx-5 mt-5">
    <div class="col-md-6 px-2 border rounded py-3 container-fluid comercializacion-card">
        <h4 class="mb-4 h4-comercializacion">Envíos y Entregas</h4>
        <div class="mb-4">
            <h6 class="fw-bold text-uppercase small">Envío Asegurado a domicilio</h6>
            <p class="text-muted small">
                Realizamos envíos a todo el país a través de logística especializada. Cada pieza viaja con seguro total.
            </p>
        </div>
        <div class="mb-4">
            <h6 class="fw-bold text-uppercase small">Retiro en Showroom</h6>
            <p class="text-muted small">
                Podés retirar tu compra de forma gratuita en nuestra sucursal central.
            </p>
        </div>
    </div>

    <div class="col-md-6 px-2 px-2 border rounded py-3 container-fluid comercializacion-card">
        <h4 class="mb-4 h4-comercializacion">Formas de Pago</h4>
        <div class="mb-4">
            <h6 class="fw-bold text-uppercase small">Tarjetas y Cuotas</h6>
            <p class="text-muted small">
                Aceptamos todas las tarjetas de crédito. Consultá por promociones de hasta 6 cuotas sin interés.
            </p>
        </div>
        <div class="mb-4">
            <h6 class="fw-bold text-uppercase small">Transferencia Bancaria</h6>
            <p class="text-muted small">
                Ofrecemos un 10% de descuento adicional para pagos mediante transferencia bancaria.
            </p>
        </div>
    </div>
</div>

<div class="container my-5 w-100">
    <div class="row gx-5 justify-content-center">

        <div class="col-md-5 w-50 comercializacion-card">
            <div class="p-4 rounded shadow-sm h-100" style="background-color: #bcaaa4; color: white;">
                <h3 class="h4 mb-4">Envíos y Entregas</h3>
                <p class="fw-bold text-uppercase small">Envío asegurado a domicilio</p>
                <p class="small mb-4">Realizamos envíos a todo el país a través de logística especializada. Cada pieza viaja con seguro total.</p>

                <p class="fw-bold text-uppercase small">Retiro en Showroom</p>
                <p class="small">Podés retirar tu compra de forma gratuita en nuestra sucursal central.</p>
            </div>
        </div>

        <div class="col-md-5 w-50 comercializacion-card">
            <div class="p-4 rounded shadow-sm h-100">
                <h4 class="h4-comercializacion mb-4">Formas de Pago</h3>
                <p class="fw-bold text-uppercase small">Tarjetas y cuotas</p>
                <p class="small mb-4">Aceptamos todas las tarjetas de crédito. Consultá por promociones de hasta 6 cuotas sin interés.</p>

                <p class="fw-bold text-uppercase small">Transferencia Bancaria</p>
                <p class="small">Ofrecemos un 10% de descuento adicional para pagos mediante transferencia bancaria.</p>
            </div>
        </div>

    </div>
</div>






<div class="mt-5 p-5 text-center" style="background-color: #f8f5f2; border-radius: 5px;">
    <h4 style="font-family: 'Cormorant Garamond', serif;" class="mb-3">Información de interés</h4>
    <p class="text-muted mx-auto small" style="max-width: 700px;">
        Todas nuestras piezas se entregan en estuche de lujo con su correspondiente certificado de autenticidad.
    </p>
</div>


@endsection