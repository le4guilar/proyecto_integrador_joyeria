@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')
<div class="container mt-5 mb-5">
    
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
            <div>
                <h3 class="mb-0 fw-bold text-dark">Gestión de Categorías</h3>
                <small class="text-muted">Clasificación de las joyas</small>
            </div>
            <a href="{{ route('categoria-joyas.create') }}" class="btn btn-primary fw-semibold btn-sm px-3">
                <i class="bi bi-plus-circle me-1"></i> Nueva Categoría
            </a>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary">
                        <tr>
                            <th scope="col" class="ps-4">Número</th>
                            <th scope="col">Nombre Categoría</th>
                            <th scope="col" class="text-center pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categoria_joya as $categoria_joya)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">{{ $categoria_joya->id }}</td>
                            <td><span class="fw-bold text-dark">{{ $categoria_joya->nombre_categoria }}</span></td>
                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('categoria-joyas.edit', $categoria_joya->id) }}" class="btn btn-warning btn-sm text-white" title="Editar">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                    <form action="{{ route('categoria-joyas.destroy', $categoria_joya->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
                                        @csrf
                                        @method('DELETE') 
                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                            <i class="bi bi-trash"></i> Eliminar 
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">
                                <i class="bi bi-folder-x fs-2 d-block mb-2 text-secondary"></i>
                                No hay categorías registradas todavía.
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