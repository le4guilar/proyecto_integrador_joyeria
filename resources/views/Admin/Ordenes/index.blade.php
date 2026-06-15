@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')
<div class="container my-4">
    <h2 class="mb-4">Listado de Pedidos</h2>

    {{-- Formulario de Búsqueda y Filtros --}}
    <form action="{{ route('admin.ordenes.index') }}" method="GET" id="form-filtros" class="mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-md-5">
                <div class="input-group shadow-sm">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" name="buscar_id" class="form-control" placeholder="Buscar por N° de Orden (Ej: 15)" value="{{ request('buscar_id') }}">
                    <button type="submit" class="btn btn-dark">Buscar</button>
                </div>
            </div>
            <div class="col-md-7 text-md-end">
                @if(request('buscar_id') || request('estado_id'))
                <a href="{{ route('admin.ordenes.index') }}" class="btn btn-outline-danger btn-sm">Limpiar Filtros</a>
                @endif
            </div>
        </div>
    </form>

    <div class="table-responsive shadow-sm rounded-3">
        <table class="table table-bordered table-hover align-middle mb-0 bg-white">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">ID Orden</th>
                    <th>Cliente</th>
                    <th class="text-center">Total</th>
                    <th style="min-width: 200px;">
                        {{-- El TH ahora tiene el select de filtro incorporado --}}
                        <div class="d-flex align-items-center justify-content-between">
                            <span>Estado</span>
                            {{-- Este select envía el formulario de arriba automáticamente al cambiar --}}
                            <select name="estado_id" class="form-select text-white form-select-sm w-auto d-inline-block ms-2 bg-transparent" form="form-filtros" onchange="document.getElementById('form-filtros').submit();">
                                <option value="">Todos</option>
                                @foreach($estados as $est)
                                <option value="{{ $est->id }}" {{ request('estado_id') == $est->id ? 'selected' : '' }}>
                                    {{ $est->nombre_estado_orden }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ordenes as $orden)
                <tr>
                    <td class="text-center fw-bold">#{{ str_pad($orden->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $orden->usuario->nombre ?? 'N/A' }} {{ $orden->usuario->apellido ?? '' }}</td>
                    <td class="text-center fw-semibold text-success">${{ number_format($orden->total, 2, ',', '.') }}</td>
                    <td>
                        {{-- Formulario para cambiar el estado rápidamente --}}
                        <form action="{{ route('admin.ordenes.updateEstado', $orden->id) }}" method="POST" class="m-0">
                            @csrf
                            @method('PATCH')

                            @php
                            $estadoStr = strtolower($orden->estado->nombre_estado_orden ?? '');
                            $colorSelect = match($estadoStr) {
                            'pagado' => 'border-info text-info',
                            'preparando' => 'border-warning text-warning',
                            'en camino' => 'border-primary text-primary',
                            'entregado' => 'border-success text-success',
                            'cancelado' => 'border-danger text-danger',
                            default => 'border-secondary text-secondary'
                            };
                            @endphp

                            <select name="estado_orden_id" class="form-select form-select-sm fw-bold {{ $colorSelect }}" onchange="this.form.submit()" style="min-width: 130px;">
                                @foreach($estados as $est)
                                <option value="{{ $est->id }}" class="text-dark" {{ $orden->estado_orden_id == $est->id ? 'selected' : '' }}>
                                    {{ $est->nombre_estado_orden }}
                                </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td class="text-center">{{ $orden->created_at->format('d/m/Y H:i') }}</td>
                    <td class="text-center">
                        {{-- Botón que acciona el desplegable (Collapse) --}}
                        <button class="btn btn-sm btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#detalle-orden-{{ $orden->id }}" aria-expanded="false" aria-controls="detalle-orden-{{ $orden->id }}">
                            Ver Detalle
                        </button>
                    </td>
                </tr>

                {{-- Fila Oculta: Desplegable con los detalles del pedido --}}
                <tr class="p-0 border-0">
                    <td colspan="6" class="p-0 border-0">
                        <div class="collapse" id="detalle-orden-{{ $orden->id }}">
                            <div class="p-4 bg-light border-bottom border-dark border-opacity-10">
                                <h6 class="fw-bold mb-3 text-uppercase text-muted" style="font-size: 0.85rem;">Joyas incluidas en la orden #{{ $orden->id }}</h6>

                                @if(isset($orden->detalles) && $orden->detalles->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless align-middle mb-0 bg-transparent">
                                        <thead class="border-bottom border-secondary">
                                            <tr>
                                                <th class="text-muted">Joya</th>
                                                <th class="text-center text-muted">Precio Unitario</th>
                                                <th class="text-center text-muted">Cantidad</th>
                                                <th class="text-end text-muted">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orden->detalles as $detalle)
                                            <tr>
                                                <td class="fw-semibold">{{ $detalle->producto->nombre_joya ?? 'Joya eliminada' }}</td>
                                                <td class="text-center">${{ number_format($detalle->precio_unitario, 2, ',', '.') }}</td>
                                                <td class="text-center">x{{ $detalle->cantidad }}</td>
                                                <td class="text-end fw-bold text-dark">${{ number_format($detalle->subtotal, 2, ',', '.') }}</td>
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
                {{-- Fin Fila Oculta --}}

                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                        No se encontraron pedidos con esos filtros.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
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