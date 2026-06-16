@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')
<div class="container mt-5 mb-5">

    <div class="card shadow border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <h3 class="mb-0 fw-bold text-dark">Consultas Recibidas</h3>
            <small class="text-muted">Bandeja de entrada de clientes y visitantes</small>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary">
                        <tr>
                            <th scope="col" class="ps-4">Fecha</th>
                            <th scope="col">Remitente</th>
                            <th scope="col">Cuenta</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Estado</th>
                            <th scope="col" class="text-center pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($consultas as $consulta)
                        <tr>
                            <td class="ps-4 text-muted small">{{ $consulta->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <strong class="text-dark d-block">{{ $consulta->nombre }}</strong>
                                <small class="text-muted">{{ $consulta->email }}</small>
                            </td>
                            <td>
                                @if($consulta->usuario)
                                    <span class="badge bg-success-subtle text-success px-2 py-1">Registrado</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary px-2 py-1">Visitante</span>
                                @endif
                            </td>
                            <td class="text-muted">{{ $consulta->telefono }}</td>
                            <td>
                                @if($consulta->estado)
                                    <span class="badge bg-warning-subtle text-warning-emphasis px-2 py-1">Pendiente</span>
                                @else
                                    <span class="badge bg-light text-secondary border px-2 py-1">Leída</span>
                                @endif
                            </td>
                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#mensaje-{{ $consulta->id }}" aria-expanded="false" aria-controls="mensaje-{{ $consulta->id }}">
                                        <i class="bi bi-eye"></i> Ver
                                    </button>

                                    @if($consulta->estado)
                                        <form action="{{ route('admin.consultas.leida', $consulta->id) }}" method="POST" class="m-0">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="bi bi-check2-all"></i> Leída
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>

                        <!-- Fila oculta que contiene el mensaje -->
                        <tr class="p-0 border-0">
                            <td colspan="6" class="p-0 border-0">
                                <div class="collapse" id="mensaje-{{ $consulta->id }}">
                                    <div class="p-4 bg-light border-bottom border-dark border-opacity-10">
                                        <h6 class="fw-bold mb-2 text-uppercase text-muted" style="font-size: 0.85rem;"><i class="bi bi-chat-left-text me-2"></i>Mensaje de {{ $consulta->nombre }}:</h6>
                                        <p class="mb-0 text-dark text-break">{{ $consulta->mensaje }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-envelope-x fs-2 d-block mb-2 text-secondary"></i>
                                No hay consultas registradas aún.
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