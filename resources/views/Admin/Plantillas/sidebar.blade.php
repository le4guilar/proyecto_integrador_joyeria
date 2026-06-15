<div class="bg-white border-end vh-100 sticky-top" style="width: 260px;">
    <div class="mb-4 px-4 pt-4">
        <span class="text-muted small text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 1px;">Panel de</span>
        <h5 class="fw-bold text-dark mt-1">Administración</h5>
    </div>

    <div class="nav flex-column nav-pills w-100">
        <a href="/admin" class="nav-link text-start rounded-0 border-bottom py-3 px-4 custom-admin-link">
            <i class="bi bi-speedometer2 me-2"></i> Inicio
        </a>
        <a href="/categoria-joyas" class="nav-link text-start rounded-0 border-bottom py-3 px-4 custom-admin-link">
            <i class="bi bi-collection me-2"></i> Categorías
        </a>
        <a href="/productos" class="nav-link text-start rounded-0 border-bottom py-3 px-4 custom-admin-link">
            <i class="bi bi-box-seam me-2"></i> Productos
        </a>
        <a href="{{ route('admin.ordenes.index') }}" class="nav-link text-start rounded-0 border-bottom py-3 px-4 custom-admin-link">
            <i class="bi bi-cart me-2"></i> Pedidos
        </a>
        <a href="/usuarios" class="nav-link text-start rounded-0 border-bottom py-3 px-4 custom-admin-link">
            <i class="bi bi-people me-2"></i> Usuarios
        </a>
        <a href="{{ route('admin.consultas.index') }}" class="nav-link text-start rounded-0 border-bottom py-3 px-4 custom-admin-link">
            <i class="bi bi-envelope me-2"></i> Consultas
        </a>
    </div>
</div>