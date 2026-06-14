@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')
<div class="container my-4">
    <h2 class="mb-4">Listado de Pedidos</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID Orden</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ordenes as $orden)
                <tr>
                    <td>#{{ str_pad($orden->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $orden->usuario->nombre ?? 'N/A' }} {{ $orden->usuario->apellido ?? '' }}</td>
                    <td>${{ number_format($orden->total, 2, ',', '.') }}</td>
                    <td>
                        @php
                        $estado = strtolower($orden->estado->nombre_estado_orden ?? '');
                        $colorBadge = match($estado) {
                        'pagado' => 'bg-info text-dark',
                        'preparando' => 'bg-warning text-dark',
                        'en camino' => 'bg-primary',
                        'entregado' => 'bg-success',
                        'cancelado' => 'bg-danger',
                        default => 'bg-secondary'
                        };
                        @endphp
                        <span class="badge {{ $colorBadge }}">
                            {{ $orden->estado->nombre_estado_orden ?? 'Pagado' }}
                        </span>
                    </td>
                    <td>{{ $orden->created_at->format('d/m/Y H:i') }}</td>
                    <td>

                        <a href="{{ route('ordenes.detalles', $orden->id) }}" class="btn btn-sm btn-primary">Ver Detalle</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-3">No hay pedidos registrados aún.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


<script>
    window.addEventListener('pageshow', function(event) {
        // Si la página se carga desde la memoria caché del navegador (al ir atrás)
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>