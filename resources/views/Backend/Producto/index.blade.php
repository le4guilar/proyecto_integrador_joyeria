@extends('plantilla-principal')

@section('contenido')

<div class="container mt-5 mb-5">

    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
            <div>
                <h3 class="mb-0 fw-bold text-dark">Gestión de Productos</h3>
                <small class="text-muted">Inventario del catálogo</small>
            </div>
            <a href="{{ route('productos.create') }}" class="btn btn-primary fw-semibold btn-sm px-3">
                <i class="bi bi-gem me-1"></i> Cargar Nueva Joya
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary">
                        <tr>
                            <th scope="col" class="ps-4" style="width: 80px;">Imagen</th>
                            <th scope="col">Joya / Descripción</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Género</th>
                            <th scope="col">Precio Unitario</th>
                            <th scope="col" class="text-center">Stock</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productos as $producto)
                        <tr>
                            <td class="ps-4">
                                @if($producto->url_imagen)
                                {{-- Apuntamos al enlace simbólico del storage --}}
                                <img src="{{ asset('storage/' . $producto->url_imagen) }}"
                                    alt="{{ $producto->nombre_joya }}"
                                    class="img-thumbnail rounded shadow-sm"
                                    style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                {{-- Imagen alternativa temporal si no subieron una --}}
                                <div class="bg-secondary-subtle rounded d-flex align-items-center justify-content-center shadow-sm" style="width: 60px; height: 60px;">
                                    <i class="bi bi-image text-muted fs-4"></i>
                                </div>
                                @endif
                            </td>

                            <td>
                                <h6 class="mb-0 fw-bold text-dark">{{ $producto->nombre_joya }}</h6>
                                <small class="text-muted text-truncate d-inline-block" style="max-width: 250px;">
                                    {{ $producto->descripcion }}
                                </small>
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $producto->categoria->nombre_categoria ?? 'Sin categoría' }}
                                </span>
                            </td>

                            <td>
                                <span class="badge bg-light text-secondary border">
                                    {{ $producto->genero->nombre_genero ?? 'General' }}
                                </span>
                            </td>

                            <td class="fw-semibold text-dark">
                                ${{ number_format($producto->precio_unitario, 2, ',', '.') }}
                            </td>

                            <td class="text-center">
                                @if($producto->stock <= $producto->stock_bajo)
                                    <span class="badge bg-danger-subtle text-danger px-2 py-1" title="Stock por debajo del límite mínimo!">
                                        {{ $producto->stock }} ¡Poco Stock!
                                    </span>
                                    @else
                                    <span class="badge bg-success-subtle text-success px-2 py-1">
                                        {{ $producto->stock }} u.
                                    </span>
                                    @endif
                            </td>

                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- Botón Editar --}}
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm text-white" title="Editar Joya">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>

                                    {{-- Botón Eliminar protegido con formulario --}}
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas dar de baja a este producto?');">
                                        @csrf
                                        @method('DELETE') <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-gem fs-2 d-block mb-2 text-secondary"></i>
                                No hay joyas cargadas en el inventario actual.
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