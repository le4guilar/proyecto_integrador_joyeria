<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm p-3">
    <div class="container-fluid px-3">
        <span class="navbar-brand mb-0 h5 fw-bold text-dark" style="font-size: 1.1rem;">Resumen de Actividad</span>

        <form action="/logout" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-link text-danger text-decoration-none p-0 small text-uppercase fw-semibold" style="font-size: 0.8rem;">
                Cerrar sesión <i class="bi bi-box-arrow-right ms-1"></i>
            </button>
        </form>
    </div>
</nav>