@extends('Plantillas/plantilla-principal')
@section('contenido')

<!-- PAGINA CON LA DESCRIPCION Y OPCIONES DEL PRODUCTO-->

<div class="container mt-5 py-5">
    <div class="row g-5 align-items-center">
        <div class="col-md-6 text-center">
            @if($producto->url_imagen)
                <img src="{{ asset($producto->url_imagen) }}" class="img-fluid rounded-3 shadow" alt="{{ $producto->nombre_joya }}" style="max-height: 400px; object-fit: cover;">
            @else
                <img src="{{ asset('img/Catalogo/Pagina1/Anillo1.png') }}" class="img-fluid rounded-3 shadow" alt="Imagen por defecto" style="max-height: 400px;">
            @endif
        </div>

        <div class="col-md-6">
            <span class="text-muted text-uppercase small tracking-wider">Detalle de la Joya</span>
            <h1 class="display-5 fw-bold mt-2 text-dark">{{ $producto->nombre_joya }}</h1>
            
            <!-- Formateo de precio argentino -->
            <h3 class="text-success my-3 fw-semibold">$ {{ number_format($producto->precio_unitario, 2, ',', '.') }}</h3>
            
            <hr class="my-4" style="opacity: 0.15;">
            
            <p class="text-secondary lead">{{ $producto->descripcion }}</p>
            
            <p class="text-muted small">
                Disponibilidad: 
                @if($producto->stock > 0)
                    <span class="badge bg-success">En Stock ({{ $producto->stock }} u.)</span>
                @else
                    <span class="badge bg-danger"> Sin Stock temporalmente</span>
                @endif
            </p>

            <form action="{{ route('carrito.store') }}" method="POST" class="mt-4" style="max-width: 300px;">
                @csrf
                <!-- Se envia el ID dinamico de la joya actual -->
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                
                <div class="mb-3">
                    <label class="form-label small text-uppercase text-muted fw-semibold">Cantidad a llevar</label>
                    <select name="cantidad" class="form-select" {{ $producto->stock <= 0 ? 'disabled' : '' }}>
                        <!-- Genera opciones reales basadas en el stock de DBeaver (Máximo 5) -->
                        @for ($i = 1; $i <= min(5, $producto->stock); $i++)
                            <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'unidad' : 'unidades' }}</option>
                        @endfor
                    </select>
                </div>

                <button type="submit" class="btn btn-dark btn-lg w-100 text-uppercase fs-6 fw-semibold shadow-sm" {{ $producto->stock <= 0 ? 'disabled' : '' }}>
                    {{ $producto->stock <= 0 ? ' Sin Stock' : ' Agregar al carrito' }}
                </button>
            </form>
        </div>
    </div>
</div>

@endsection