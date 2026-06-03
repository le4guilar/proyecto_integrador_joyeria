<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard ALBA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon.svg') }}">

</head>

<body>
    <div class="d-flex">
        @include('Admin/Plantillas.sidebar')

        <div class="flex-grow-1 bg-light">
            @include('Admin/Plantillas.navbar')

            <div class="p-4">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h6 class="card-title">Ventas del Día</h6>
                                <h3 class="card-text">$4,500</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h6 class="card-title">Nuevos Pedidos</h6>
                                <h3 class="card-text">24</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <h6 class="card-title">Usuarios Registrados</h6>
                                <h3 class="card-text">1,250</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header bg-white">
                        Últimos Pedidos
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1024</td>
                                    <td>Juan Pérez</td>
                                    <td>$150.00</td>
                                    <td><span class="badge bg-success">Completado</span></td>
                                </tr>
                                <tr>
                                    <td>#1025</td>
                                    <td>María López</td>
                                    <td>$85.50</td>
                                    <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>