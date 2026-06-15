@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')
<div class="container my-4">
    <h2 class="mb-4">Consultas Recibidas</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Remitente</th>
                    <th>Cuenta</th>
                    <th>Teléfono</th>
                    <th>Mensaje</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <strong>{{ $consulta->nombre }}</strong><br>
                        <small class="text-muted">{{ $consulta->email }}</small>
                    </td>
                    <td>
                        @if($consulta->usuario)
                            <span class="badge bg-success">Registrado</span>
                        @else
                            <span class="badge bg-secondary">Visitante</span>
                        @endif
                    </td>
                    <td>{{ $consulta->telefono }}</td>
                    <td>{{ $consulta->mensaje }}</td>
                    <td>
                        @if($consulta->estado)
                            <span class="badge bg-warning text-dark">Pendiente</span>
                        @else
                            <span class="badge bg-light text-muted border">Leída</span>
                        @endif
                    </td>
                    <td>
                        {{-- Botón para marcar como leída --}}
                        @if($consulta->estado)
                            <form action="{{ route('admin.consultas.leida', $consulta->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">Marcar Leída</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-3">No hay consultas registradas aún.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection