@extends('plantilla-principal')

@section('contenido')

<div class="container mt-5 mb-5">
    <div class="card shadow border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-bold text-primary">Gestión de Productos</h3>
            <a href="#" class="btn btn-primary btn-sm fw-semibold">
                <i class="bi bi-plus-circle me-1"></i> Nuevo Producto
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="ps-4">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- El bucle @forelse es genial: si hay datos los recorre, si está vacío muestra el @empty --}}
                        @forelse ($productos as $producto)
                            <tr>
                                <td class="ps-4 fw-bold text-secondary">{{ $producto->id }}</td>
                                <td>{{ $producto->nombre_joya }}</td>
                                <td>${{ number_format($producto->precio_unitario) }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm text-white me-1" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder-x display-4 d-block mb-2"></i>
                                    No hay productos registrados todavía.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection