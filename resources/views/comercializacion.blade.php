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

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>


