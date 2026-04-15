<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <title>Joyería</title>
</head>
<body>
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
    <main>

    </main>
    <footer>
        <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Alba</h5>
                        <p>Aca se agregan los iconos de las redes sociales </p>
                        <p>Aca agregamos el mapa con la ubicacion del local fisico</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nosotros</h5>
                        <a href="/nosotros">Quienes somos</p>
                        <a href="/contacto">Contacto</p>
                        <a href="/terminosyusos">Terminos y Usos</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Comercialización</h5>
                        <p class="card-text">Acá los íconos de efectivo, mercado pago, tarjeta visa, tarjeta mastercard</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>