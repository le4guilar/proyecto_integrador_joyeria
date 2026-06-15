@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')
<div class="container mt-5 mb-5">

    <div class="card shadow border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <h3 class="mb-0 fw-bold text-dark">Listado de Pedidos</h3>
            <small class="text-muted">Historial y gestión de ventas</small>
        </div>

        <div class="card-body p-0">
            {{-- Formulario de Búsqueda y Filtros con diseño de bloque gris claro --}}
            <form action="{{ route('admin.ordenes.index') }}" method="GET" id="form-filtros" class="bg-light p-3 border-bottom row g-2 m-0">
                <div class="col-md-5">
                    <div class="input-group input-group-sm shadow-sm">
                        <span class="input-group-text bg-white text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" name="buscar_id" class="form-control" placeholder="Buscar N° de Orden (Ej: 15)" value="{{ request('buscar_id') }}">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <select name="estado_id" class="form-select form-select-sm shadow-sm">
                        <option value="">Todos los estados</option>
                        @foreach($estados as $est)
                        <option value="{{ $est->id }}" {{ request('estado_id') == $est->id ? 'selected' : '' }}>
                            {{ $est->nombre_estado_orden }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-sm w-100">
                        <i class="bi bi-filter"></i> Filtrar
                    </button>
                    <a href="{{ route('admin.ordenes.index') }}" class="btn btn-outline-secondary btn-sm w-100">
                        <i class="bi bi-trash"></i> Limpiar
                    </a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary">
                        <tr>
                            <th scope="col" class="ps-4 text-center">ID Orden</th>
                            <th scope="col">Cliente</th>
                            <th scope="col" class="text-center">Total</th>
                            <th scope="col">Estado</th>
                            <th scope="col" class="text-center">Fecha</th>
                            <th scope="col" class="text-center pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ordenes as $orden)
                        <tr>
                            <td class="ps-4 text-center fw-bold text-secondary">#{{ str_pad($orden->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td>
                                <strong class="text-dark d-block">{{ $orden->usuario->nombre ?? 'N/A' }} {{ $orden->usuario->apellido ?? '' }}</strong>
                            </td>
                            <td class="text-center fw-semibold text-success">${{ number_format($orden->total, 2, ',', '.') }}</td>
                            <td>
                                {{-- Formulario para cambiar el estado con fondos de estilo "subtle" (suaves) --}}
                                <form action="{{ route('admin.ordenes.updateEstado', $orden->id) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('PATCH')

                                    @php
                                    $estadoStr = strtolower($orden->estado->nombre_estado_orden ?? '');
                                    $colorSelect = match($estadoStr) {
                                        'pagado' => 'border-info text-info-emphasis bg-info-subtle',
                                        'preparando' => 'border-warning text-warning-emphasis bg-warning-subtle',
                                        'en camino' => 'border-primary text-primary-emphasis bg-primary-subtle',
                                        'entregado' => 'border-success text-success-emphasis bg-success-subtle',
                                        'cancelado' => 'border-danger text-danger-emphasis bg-danger-subtle',
                                        default => 'border-secondary text-secondary bg-light'
                                    };
                                    @endphp

                                    <select name="estado_orden_id" class="form-select form-select-sm fw-semibold {{ $colorSelect }}" onchange="this.form.submit()" style="min-width: 140px;">
                                        @foreach($estados as $est)
                                        <option value="{{ $est->id }}" class="text-dark" {{ $orden->estado_orden_id == $est->id ? 'selected' : '' }}>
                                            {{ $est->nombre_estado_orden }}
                                        </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td class="text-center text-muted small">{{ $orden->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-center pe-4">
                                <button class="btn btn-sm btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#detalle-orden-{{ $orden->id }}" aria-expanded="false" aria-controls="detalle-orden-{{ $orden->id }}">
                                    <i class="bi bi-eye"></i> Detalle
                                </button>
                            </td>
                        </tr>

                        {{-- Fila Oculta: Desplegable con los detalles del pedido --}}
                        <tr class="p-0 border-0">
                            <td colspan="6" class="p-0 border-0">
                                <div class="collapse" id="detalle-orden-{{ $orden->id }}">
                                    <div class="p-4 bg-light border-bottom border-dark border-opacity-10">
                                        <h6 class="fw-bold mb-3 text-uppercase text-muted" style="font-size: 0.85rem;"><i class="bi bi-box2 me-2"></i>Joyas incluidas en la orden #{{ $orden->id }}</h6>

                                        @if(isset($orden->detalles) && $orden->detalles->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table table-sm table-borderless align-middle mb-0 bg-transparent">
                                                <thead class="border-bottom border-secondary-subtle">
                                                    <tr>
                                                        <th class="text-muted">Joya</th>
                                                        <th class="text-center text-muted">Precio Unitario</th>
                                                        <th class="text-center text-muted">Cantidad</th>
                                                        <th class="text-end text-muted pe-4">Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orden->detalles as $detalle)
                                                    <tr>
                                                        <td class="fw-semibold text-dark">{{ $detalle->producto->nombre_joya ?? 'Joya eliminada' }}</td>
                                                        <td class="text-center text-muted">${{ number_format($detalle->precio_unitario, 2, ',', '.') }}</td>
                                                        <td class="text-center">
                                                            <span class="badge bg-secondary">x{{ $detalle->cantidad }}</span>
                                                        </td>
                                                        <td class="text-end fw-bold text-dark pe-4">${{ number_format($detalle->subtotal, 2, ',', '.') }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                        <p class="text-muted mb-0 small">No hay detalles disponibles para este pedido.</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-2 d-block mb-2 text-secondary"></i>
                                No se encontraron pedidos con esos filtros.
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

<script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });
</script>