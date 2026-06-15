@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-0">Dashboard</h3>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 h-100 p-3 bg-white">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <span class="text-muted small d-block mb-2">Pedidos<br>pendientes</span>
                    <h3 class="fw-bold text-dark mb-0">{{ $pedidosPendientes }}</h3>
                </div>
                <div class="text-danger fs-3"><i class="bi bi-box-seam"></i></div>
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
                <div class="text-info fs-3"><i class="bi bi-cash-stack"></i></div>
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
                <div class="text-dark fs-3"><i class="bi bi-person-fill"></i></div>
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
                <div class="text-warning fs-3"><i class="bi bi-truck"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
            <h5 class="fw-bold text-dark mb-4">Ventas por Categoría</h5>
            <div style="height: 250px; display: flex; justify-content: center;">
                <canvas id="categoriasChart"></canvas>
            </div>
        </div>
    </div>
    
<div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
            <h5 class="fw-bold text-dark mb-4">Cotización de Metales</h5>
            <p class="text-muted small mb-4">Valores de referencia</p>
            
            <div class="d-flex align-items-center mb-4">
                <div class="bg-warning bg-opacity-25 text-warning rounded-circle d-flex justify-content-center align-items-center me-3 fs-4" style="width: 55px; height: 55px;">
                    <i class="bi bi-record-circle"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold text-dark">Oro 18k</h6>
                    <span class="text-muted small">$ 65.000 / gramo</span>
                </div>
            </div>
            
            <div class="d-flex align-items-center">
                <div class="bg-secondary bg-opacity-25 text-secondary rounded-circle d-flex justify-content-center align-items-center me-3 fs-4" style="width: 55px; height: 55px;">
                    <i class="bi bi-gem"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold text-dark">Plata 925</h6>
                    <span class="text-muted small">$ 2.500 / gramo</span>
                </div>
            </div>
        </div>
    </div></div>

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
                <div class="fs-5">
                    @if($loop->first)
                        <i class="bi bi-gem text-warning"></i> @else
                        <i class="bi bi-gem text-secondary opacity-50"></i> @endif
                </div>
            </div>
            @empty
            <p class="text-muted small">Aún no hay ventas registradas.</p>
            @endforelse
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('categoriasChart').getContext('2d');
        const nombres = JSON.parse('{!! $nombresCategorias !!}');
        const totales = JSON.parse('{!! $totalesCategorias !!}');

        // 1. Calculamos la suma total para sacar los porcentajes
        const sumaTotal = totales.reduce((acc, val) => acc + Number(val), 0);

        // 2. Creamos nuevas etiquetas combinando el nombre y su porcentaje
        const etiquetasConPorcentaje = nombres.map((nombre, index) => {
            const porcentaje = sumaTotal > 0 ? ((totales[index] / sumaTotal) * 100).toFixed(1) : 0;
            return `${nombre} (${porcentaje}%)`;
        });

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: etiquetasConPorcentaje, 
                datasets: [{
                    data: totales,
                    backgroundColor: [
                        '#300403',
                        '#D4AF37', 
                        '#6c757d', 
                        '#17a2b8',
                        '#5555FF',  
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'right' }
                },
                cutout: '70%'
            }
        });
    });
</script>
@endsection