@extends('Plantillas/plantilla-principal')
@section('contenido')


<div class="container my-5" style="font-family: 'Montserrat', sans-serif;">

    <div class="d-flex justify-content-between align-items-center mb-5 border-bottom pb-3">
        <h2 class="mb-0 text-dark fw-bold" style="letter-spacing: -1px;">Mi carrito
            <span class="text-muted fw-normal fs-5">
                ({{ $items->count() }} {{ $items->count() == 1 ? 'artículo' : 'artículos' }})
            </span>
        </h2>
        <a href="{{ route('catalogo1') }}" class="text-dark text-decoration-none small">
            Continuar comprando 
            <i class="bi bi-arrow-right-circle-fill"></i>
        </a>
    </div>

<!-- ALERTAS DE ESTADO -->
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- ALERTAS DE ERROR OCULTOS -->
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!--SI EL CARRITO TIENE PRODUCTOS -->
    @if($items->count() > 0)
    <div class="row g-5">

        <!-- COLUMNA IZQUIERDA: LISTA DE PRODUCTOS -->
        <div class="col-lg-8">

            @foreach($items as $item)
            <div class="row align-items-center mb-4 pb-4 border-bottom position-relative">

                <!-- Imagen del Producto -->
                <div class="col-md-2 col-3">
                    @if($item->producto && $item->producto->url_imagen)
                    <img src="{{ asset($item->producto->url_imagen) }}"
                        alt="{{ $item->producto->nombre_joya }}"
                        class="img-fluid rounded shadow-sm"
                        style="object-fit: cover; aspect-ratio: 1/1;">
                    @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center shadow-sm"
                        style="aspect-ratio: 1/1;">
                        <span class="text-muted small">Sin Foto</span>
                    </div>
                    @endif
                </div>

                <!-- Detalles y Cantidad -->
                <div class="col-md-7 col-9">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <h5 class="mb-1 fw-semibold text-dark">
                                {{ $item->producto ? $item->producto->nombre_joya : 'Joya no disponible' }}
                            </h5>
                            <p class="text-muted small mb-0">SKU: {{ str_pad($item->producto_id, 5, '0', STR_PAD_LEFT) }}</p>
                        </div>

                        {{-- Subtotal (Precio x Cantidad) --}}
                        <div class="text-end">
                            <p class="fw-bold fs-5 mb-0 text-dark">
                                ${{ number_format(($item->precio_unitario * $item->cantidad), 2, ',', '.') }}
                            </p>
                            <p class="text-muted small mb-0">
                                ${{ number_format($item->precio_unitario, 2, ',', '.') }} / u.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3 mt-3">
                        <!-- Control de Cantidad -->
                        <div class="d-flex align-items-center border rounded">
                            <span class="px-3 py-1 text-muted small">Cant.</span>
                            <span class="px-3 py-1 fw-bold border-start bg-light text-dark">{{ $item->cantidad }}</span>
                        </div>
                    </div>
                </div>

                <!-- Botón de Eliminar (Se corrigio: Le agregamos el texto para que aparezca en pantalla) -->
                <div class="position-absolute top-0 end-0 mt-2 me-2" style="width: auto;">
                    <form action="{{ route('carrito.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger p-0 text-decoration-none small fw-semibold"
                            onclick="return confirm('¿Querés quitar esta joya de tu carrito ALBA?')">
                            Quitar
                        </button>
                    </form>
                </div>

            </div>
            @endforeach
        </div>

        <!-- COLUMNA DERECHA: RESUMEN DEL PEDIDO  -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 bg-light position-sticky" style="top: 2rem;">
                <div class="card-body p-4">
                    <h4 class="card-title mb-4 fw-bold text-dark">Resumen del pedido</h4>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-semibold text-dark">${{ number_format($total, 2, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Envío (Estimado)</span>
                        <span class="text-success fw-semibold">GRATIS</span>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="fs-5 fw-bold text-dark">Total</span>
                        <span class="fs-3 fw-bold text-success">${{ number_format($total, 2, ',', '.') }}</span>
                    </div>

                    <form action="{{ route('carrito.finalizar') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark btn-lg w-100 py-3 fw-bold text-uppercase shadow" style="letter-spacing: 1px;">
                            Ir a la caja
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!--SI EL CARRITO ESTA VACIO -->
    @else
    <div class="text-center py-5 my-5 bg-light rounded shadow-sm">
        <span style="font-size: 6rem; display: inline-block; margin-bottom: 1rem;">
            <i class="bi bi-bag-heart-fill" style="color: #300403 !important; -webkit-text-stroke: 1px #300403;"></i>
        </span>
        <h3 class="mt-4 text-dark fw-bold">Tu carrito ALBA está vacío</h3>
        <p class="text-muted fs-5">Nuestra colección te espera para llenarlo de brillo.</p>
        <a href="{{ route('catalogo1') }}" class="btn btn-lg mt-3 px-5 py-3 btn-alba-outline">
            Ver Joyas
        </a>
    </div>
    @endif
</div>

@endsection