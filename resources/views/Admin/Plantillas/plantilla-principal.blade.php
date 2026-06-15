<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title', 'ALBA Joyería')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
            /* Fondo claro general */
        }

        .custom-admin-link {
            transition: all 0.2s;
            color: #212529;
        }

        .custom-admin-link:hover {
            background-color: #f1f3f5;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="d-flex min-vh-100">
        @include('Admin.Plantillas.sidebar')

        <div class="flex-grow-1 d-flex flex-column">
            @include('Admin.Plantillas.navbar')

            <div class="p-4 flex-grow-1">
                @yield('contenido')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>