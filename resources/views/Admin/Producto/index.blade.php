@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')

<div class="container mt-5 mb-5">

    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role=\"alert\">
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
            <form action="{{ route('productos.index') }}" method="GET" class="bg-light p-3 border-bottom row g-2 m-0">
                <div class="col-md-3">
                    <select name="categoria_id" class="form-select form-select-sm">
                        <option value="">Todas las Categorías</option>
                        @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ request('categoria_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nombre_categoria }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="genero_id" class="form-select form-select-sm">
                        <option value="">Todos los Géneros</option>
                        @foreach($generos as $gen)
                        <option value="{{ $gen->id }}" {{ request('genero_id') == $gen->id ? 'selected' : '' }}>
                            {{ $gen->nombre_genero }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="orden_precio" class="form-select form-select-sm">
                        <option value="">Ordenar por precio</option>
                        <option value="desc" {{ request('orden_precio') == 'desc' ? 'selected' : '' }}>Precio: Mayor a Menor</option>
                        <option value="asc" {{ request('orden_precio') == 'asc' ? 'selected' : '' }}>Precio: Menor a Mayor</option>
                    </select>
                </div>

                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-sm w-100">
                        <i class="bi bi-filter"></i> Filtrar
                    </button>
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary btn-sm w-100">
                        <i class="bi bi-trash"></i> Limpiar
                    </a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary">
                        <tr>
                            <th scope="col" class="ps-4" style="width: 80px;">Imagen</th>
                            <th scope="col">Joya / Descripción</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Género</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col" class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                        <tr>
                            <td class="ps-4">
                                @if($producto->url_imagen)
                                <img src="{{ $producto->url_imagen }}" alt="{{ $producto->nombre_joya }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                                @endif
                            </td>
                            <td>
                                <span class="fw-bold text-dark d-block">{{ $producto->nombre_joya }}</span>
                                <small class="text-muted text-truncate d-inline-block" style="max-width: 250px;">{{ $producto->descripcion }}</small>
                            </td>
                            <td>{{ $producto->categoria->nombre_categoria ?? 'Sin categoría' }}</td>
                            <td>{{ $producto->genero->nombre_genero ?? 'Sin género' }}</td>
                            <td class="fw-semibold">${{ number_format($producto->precio_unitario, 2) }}</td>
                            <td class="text-center">
                                @if($producto->stock <= 0)
                                    <span class="badge bg-dark text-white px-2 py-1" title="No hay unidades disponibles">
                                    ¡Sin Stock!
                                    </span>
                                    @elseif($producto->stock <= $producto->stock_bajo)
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
                                <div class="btn-group" role="group">
                                    @if($producto->trashed())
                                    {{-- Botón para volver a activar/vender --}}
                                    <form action="{{ route('productos.restore', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm" title="Poner en venta de nuevo">
                                            <i class="bi bi-arrow-counterclockwise"></i> Activar
                                        </button>
                                    </form>
                                    @else
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
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-gem fs-2 d-block mb-2 text-secondary"></i>
                                No hay joyas cargadas en el inventario actual o que coincidan con la búsqueda.
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