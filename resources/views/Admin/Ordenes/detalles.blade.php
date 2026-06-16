@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')

@if(session('status'))
<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="container my-4">

    <!-- Encabezado y boton volver -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Detalle del Pedido #{{ str_pad($orden->id, 5, '0', STR_PAD_LEFT) }}</h2>
        <a href="{{ route('admin.ordenes.index') }}" class="btn btn-outline-secondary">
            <- Volver a Pedidos
                </a>
    </div>

    <!-- Tarjeta con info del cliente y orden -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Cliente:</strong> {{ $orden->usuario->nombre ?? 'N/A' }} {{ $orden->usuario->apellido ?? '' }}</p>
                    <p class="mb-1"><strong>Email:</strong> {{ $orden->usuario->email ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-1"><strong>Fecha:</strong> {{ $orden->created_at->format('d/m/Y H:i') }}</p>
                    <div class="mb-1 d-flex align-items-center gap-2">
                        <strong>Estado:</strong>
                        <form action="{{ route('admin.ordenes.updateEstado', $orden->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="estado_orden_id" class="form-select form-select-sm" onchange="this.form.submit()">
                                @foreach($estados as $estado)
                                <option value="{{ $estado->id }}" {{ $orden->estado_orden_id == $estado->id ? 'selected' : '' }}>
                                    {{ $estado->nombre_estado_orden }}
                                </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Detalles (Joyas) -->
    <h4 class="mb-3">Joyas en este pedido</h4>
    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Joya</th>
                    <th class="text-center">Precio Unitario</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-end">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detalles as $detalle)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            @if($detalle->producto && $detalle->producto->url_imagen)
                            <img src="{{ asset($detalle->producto->url_imagen) }}"
                                alt="Foto"
                                class="img-thumbnail me-3"
                                style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                            <div class="bg-light border text-muted d-flex align-items-center justify-content-center me-3"
                                style="width: 50px; height: 50px; font-size: 10px;">
                                Sin foto
                            </div>
                            @endif
                            <span class="fw-semibold">
                                {{ $detalle->producto->nombre_joya ?? 'Joya eliminada' }}
                            </span>
                        </div>
                    </td>
                    <td class="text-center">${{ number_format($detalle->precio_unitario, 2, ',', '.') }}</td>
                    <td class="text-center">{{ $detalle->cantidad }}</td>
                    <td class="text-end">${{ number_format($detalle->subtotal, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-light">
                <tr>
                    <th colspan="3" class="text-end fs-5">Total Abonado:</th>
                    <th class="text-end fs-5 text-success">${{ number_format($orden->total, 2, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection