@extends('plantilla-principal')

@section('contenido')

<div class="container mt-5 mb-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card shadow border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-bold text-primary">Gestión de Categorías de Joyas</h3>
            <a href="{{ route('categoria-joyas.create') }}" class="btn btn-primary btn-sm fw-semibold">
                <i class="bi bi-plus-circle me-1"></i> Nueva Categoría
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Número</th>
                            <th scope="col">Nombre Categoría</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- El bucle @forelse es genial: si hay datos los recorre, si está vacío muestra el @empty --}}
                        @forelse ($categoria_joya as $categoria_joya)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">{{ $categoria_joya->id }}</td>
                            <td>{{ $categoria_joya->nombre_categoria }}</td>
                            <td class="text-center">
                                <a href="{{ route('categoria-joyas.edit', $categoria_joya->id) }}" class="btn btn-warning btn-sm text-white me-1" title="Editar">
                                    <i class="bi bi-pencil-square"></i>Editar
                                </a>
                                <form action="{{ route('categoria-joyas.destroy', $categoria_joya->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
                                    @csrf
                                    @method('DELETE') <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="bi bi-trash"></i>Eliminar 
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-folder-x display-4 d-block mb-2"></i>
                                No hay categorías registrados todavía.
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