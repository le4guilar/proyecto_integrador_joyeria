@extends('Admin/Plantillas/plantilla-principal')


@section('contenido')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mt-4 mb-4 mx-4" role="alert">
    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container mt-5 mb-5">
    <div class="card shadow border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-bold text-dark">Gestión de Usuarios</h3>
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-sm fw-semibold">
                <i class="bi bi-person-plus-fill me-1"></i> Registrar Nuevo Usuario
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb -0">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col" class="ps-4">ID</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rol</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">{{ $usuario->id }}</td>
                            <td>{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <!-- Evaluamos el nombre del rol para asignarle un color distintivo -->
                                @if($usuario->rol->nombre_rol === 'admin')
                                <span class="badge bg-danger">Administrador</span>
                                @else
                                <span class="badge bg-primary">Cliente</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm text-white me-1">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                                @if(Auth::id() != $usuario->id)
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas dar de baja a este usuario?');">
                                    @csrf
                                    @method('DELETE') <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No hay usuarios registrados.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection