@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-0">Dashboard</h3>
    <p class="text-muted small">Resumen de la actividad de tu e-commerce</p>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-3 bg-white">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="text-muted small d-block mb-2">Pedidos<br>pendientes</span>
                    <h3 class="fw-bold text-dark mb-0">{{ $pedidosPendientes }}</h3>
                </div>
                <div class="text-danger fs-3">
                    <i class="bi bi-box-seam"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-3 bg-white">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="text-muted small d-block mb-2">Ticket medio<br>&nbsp;</span>
                    <h3 class="fw-bold text-dark mb-0">$ {{ number_format($ticketMedio, 2, ',', '.') }}</h3>
                </div>
                <div class="text-info fs-3">
                    <i class="bi bi-cash-stack"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-3 bg-white">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="text-muted small d-block mb-2">Usuarios<br>registrados</span>
                    <h3 class="fw-bold text-dark mb-0">{{ number_format($usuariosRegistrados, 0, ',', '.') }}</h3>
                </div>
                <div class="text-dark fs-3">
                    <i class="bi bi-person-fill"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-3 bg-white">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="text-muted small d-block mb-2">Pedidos<br>entregados</span>
                    <h3 class="fw-bold text-dark mb-0">{{ $pedidosEntregados }}</h3>
                </div>
                <div class="text-warning fs-3">
                    <i class="bi bi-truck"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold text-dark mb-0">Últimos pedidos</h5>
                <a href="{{ route('admin.ordenes.index') }}" class="text-decoration-none small text-primary fw-semibold">Ver todos</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="text-muted small border-bottom">
                            <th class="fw-normal pb-3 ps-0">Pedido</th>
                            <th class="fw-normal pb-3">Cliente</th>
                            <th class="fw-normal pb-3">Total</th>
                            <th class="fw-normal pb-3">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ultimosPedidos as $pedido)
                        <tr>
                            <td class="py-3 ps-0 text-muted">#{{ str_pad($pedido->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="py-3 text-dark">{{ $pedido->usuario->nombre ?? 'N/A' }} {{ $pedido->usuario->apellido ?? '' }}</td>
                            <td class="py-3 text-dark fw-medium">$ {{ number_format($pedido->total, 2, ',', '.') }}</td>
                            <td class="py-3">
                                @php
                                    $estadoStr = strtolower($pedido->estado->nombre_estado_orden ?? '');
                                    $claseBadge = match($estadoStr) {
                                        'pagado' => 'bg-info text-dark border-info',
                                        'preparando' => 'bg-warning text-dark border-warning',
                                        'en camino' => 'bg-primary text-white border-primary',
                                        'entregado' => 'bg-success text-white border-success',
                                        'cancelado' => 'bg-danger text-white border-danger',
                                        default => 'bg-light text-secondary border-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $claseBadge }} border px-3 py-2 rounded-pill fw-normal">
                                    {{ $pedido->estado->nombre_estado_orden ?? 'Pendiente' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">No hay pedidos registrados todavía.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
            <h5 class="fw-bold text-dark mb-4">Top 5 productos vendidos</h5>
            
            @forelse($topProductos as $item)
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h6 class="mb-1 text-dark fw-semibold">{{ $item->producto->nombre_joya ?? 'Joya eliminada' }}</h6>
                    <span class="small text-muted">Ranking #{{ $loop->iteration }} - {{ $item->total_vendido }} vendidos</span>
                </div>
                <div class="text-danger fs-5">
                    @if($loop->first)
                        <i class="bi bi-fire"></i> @else
                        <i class="bi bi-star"></i>
                    @endif
                </div>
            </div>
            @empty
            <p class="text-muted small">Aún no hay ventas registradas.</p>
            @endforelse

        </div>
    </div>
</div>
@endsection