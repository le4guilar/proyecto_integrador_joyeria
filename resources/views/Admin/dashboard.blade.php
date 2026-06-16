@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')

<div class="mb-4">
    <h3 class="fw-bold text-dark mb-0">Dashboard</h3>
</div>

<div class="row g-4 mb-4" style="font-family: 'Montserrat', sans-serif;">
    
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-3 h-100 p-3 bg-white border-start border-dark border-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted text-uppercase fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.5px;">Pedidos pendientes</span>
                    <h2 class="fw-bold text-dark mt-1 mb-0" style="font-size: 1.8rem;">{{ $pedidosPendientes }}</h2>
                </div>
                <div class="p-2 rounded-circle bg-transparent" style="color: #300403;">
                    <i class="bi bi-box-seam fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-3 h-100 p-3 bg-white border-start border-secondary border-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted text-uppercase fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.5px;">Ticket medio</span>
                    <h2 class="fw-bold text-dark mt-1 mb-0" style="font-size: 1.8rem;">$ {{ number_format($ticketMedio, 2, ',', '.') }}</h2>
                </div>
                <div class="p-2 rounded-circle bg-transparent" style="color: #300403;">
                    <i class="bi bi-cash-stack fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-3 h-100 p-3 bg-white border-start border-dark border-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted text-uppercase fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.5px;">Usuarios registrados</span>
                    <h2 class="fw-bold text-dark mt-1 mb-0" style="font-size: 1.8rem;">{{ number_format($usuariosRegistrados, 0, ',', '.') }}</h2>
                </div>
                <div class="p-2 rounded-circle bg-transparent" style="color: #300403;">
                    <i class="bi bi-person-fill fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-3 h-100 p-3 bg-white border-start border-secondary border-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted text-uppercase fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.5px;">Pedidos entregados</span>
                    <h2 class="fw-bold text-dark mt-1 mb-0" style="font-size: 1.8rem;">{{ $pedidosEntregados }}</h2>
                </div>
                <div class="p-2 rounded-circle bg-transparent" style="color: #300403;">
                    <i class="bi bi-truck fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4" style="font-family: 'Montserrat', sans-serif;">
    
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-3 p-4 h-100 bg-white">
            <h6 class="text-muted text-uppercase fw-semibold mb-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">Ventas por Categoría</h6>
            
            <!--Reducimos el contenedor para que el grafico mantenga una cierta proporcion de margen y no quede pegada a la tarjeta-->
            <div style="height: 220px; display: flex; justify-content: center; align-items: center;">
                <canvas id="categoriasChart"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3 p-4 h-100 bg-white">
            <h6 class="text-muted text-uppercase fw-semibold mb-1" style="font-size: 0.75rem; letter-spacing: 0.5px;">Cotización de Metales</h6>
            <p class="text-muted small mb-4" style="font-size: 0.75rem;">Valores de referencia actualizados</p>
            
            <div class="d-flex align-items-center mb-4 pb-2 border-bottom">

                <!-- Círculo dorado del oro: minimalista estilizado -->
                <div class="rounded-circle d-flex justify-content-center align-items-center me-3 fs-5" 
                     style="width: 48px; height: 48px; background-color: #fcf8e3; color: #b89123; border: 1px solid #fbeed5;">
                    <i class="bi bi-circle-fill" style="font-size: 0.6rem;"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">Oro 18k</h6>
                    <span class="text-muted small fw-medium" style="font-size: 0.8rem;">$ 65.000 / gramo</span>
                </div>
            </div>
            
            <div class="d-flex align-items-center">
                <!-- Circulo de plata minimalista estilizado -->
                <div class="rounded-circle d-flex justify-content-center align-items-center me-3 fs-5" 
                     style="width: 48px; height: 48px; background-color: #f4f5f7; color: #6c757d; border: 1px solid #e1e4e8;">
                    <i class="bi bi-diamond-fill" style="font-size: 0.6rem;"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">Plata 925</h6>
                    <span class="text-muted small fw-medium" style="font-size: 0.8rem;">$ 2.500 / gramo</span>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row g-4" style="font-family: 'Montserrat', sans-serif;">

    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="text-muted text-uppercase fw-semibold mb-0" style="font-size: 0.75rem; letter-spacing: 0.5px;">Últimos pedidos</h6>
                <a href="{{ route('admin.ordenes.index') }}" class="text-decoration-none small fw-bold text-uppercase" style="color: #300403; font-size: 0.7rem; letter-spacing: 0.5px;">Ver todos →</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead>
                        <tr class="text-muted small border-bottom" style="font-size:  0.75rem;">
                            <th class="fw-semibold pb-3 ps-0 text-uppercase">Pedido</th>
                            <th class="fw-semibold pb-3 ps-0 text-uppercase">Cliente</th>
                            <th class="fw-semibold pb-3 ps-0 text-uppercase">Total</th>
                            <th class="fw-semibold pb-3 ps-0 text-uppercase">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ultimosPedidos as $pedido)
                        <tr class="border-bottom-subtle" style="font-size:  0.90rem;">
                            <td class="py-3 ps-0 fw-bold text-secondary">#{{ str_pad($pedido->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="py-3 text-dark fw-medium">{{ $pedido->usuario->nombre ?? 'N/A' }} {{ $pedido->usuario->apellido ?? '' }}</td>
                            <td class="py-3 text-dark fw-bold">$ {{ number_format($pedido->total, 2, ',', '.') }}</td>
                            <td class="py-3 text-end">
                                <!-- Inyectamos la clase como texto limpio dentro del atributo class-->
                                <span class="badge {{ $pedido->clase_badge }} px-3 py-1.5 rounded-pill small fw-semibold" 
                                    style="font-size: 0.7rem; display: inline-block;">
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
            <h5 class="fw-bold text-dark mb-4">Las 5 joyas mas vendidas</h5>
            
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

<style>
    .badge-pagado { background-color: #286b38 !important; color: #ffffff !important; }
    .badge-camino { background-color: #300403 !important; color: #dfdada !important; }
    .badge-entregado { background-color: #6c757d !important; color: #ffffff !important; }
    .badge-cancelado { background-color: #871b26 !important; color: #ffffff !important; }
    .badge-pendiente { background-color: #a78829 !important; color: #212529 !important; }
</style>
@endsection