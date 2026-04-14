<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>Joyería</title>

    <style>
        body{
            background-color: #300404 !important;
            color: white !important;
        }
        .navbar{
            background-color transparent;
        }
    </style>

</head>
<body>
    <h1>Esto es el patio de pruebas</h1>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Joyeria</a>
                <div class="navbar-nav">
                    <a class="nav-link" href="/home">Home</a>
                    <a class="nav-link active" href="/productos">Productos</a>
                    <a class="nav-link" href="/contacto">Contacto</a>
                    <a class="nav-link" href="/nosotros">Nosotros</a>
                </div>
            </div>
    </nav>

    <div class= "fixed-bottom p-5 text-end" style="pointer-events: none;">
        <h1 style="font-family: 'Cormorant Garamond', serif; font-size: 8rem; letter-spacing: 15px; opacity: 1; color: white; margin: 0;">
            ALBA
        </h1>


    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>