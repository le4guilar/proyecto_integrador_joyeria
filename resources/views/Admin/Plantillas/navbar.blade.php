<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom p-3">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Resumen de Actividad</span>
        <form action="/logout" method="POST" style="display:inline;">
            @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">Cerrar Sesión</button>
        </form>
    </div>
</nav>

