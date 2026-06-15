@extends('Plantillas/plantilla-principal')
@section('contenido')

<!-- SE CAMBIO TODO EL CODIGO PARA QUE FUERA DINAMICO Y NO CREAR OTROS CATALOGOS--->


<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-about-title">Colección Joyería ALBA</h1>
        <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
        <p class="text-alba-bordo mt-3"> CATÁLOGO DE PRODUCTOS </p>
    </div>

    <div class="row g-5">

    <div class="card border-0 shadow-sm p-4 mb-5" style="background-color: #fdfbf7; border-radius: 8px; font-family: 'Montserrat', sans-serif;">
        <form action="{{ route('catalogo1') }}" method="GET" class="row g-3 align-items-end">
            
            <!--Buscador de Texto por Nombre -->
            <div class="col-md-4">
                <label class="form-label small text-uppercase text-muted fw-semibold">Buscar Joya</label>
                <input type="text" name="buscar" class="form-control text-dark" placeholder="Ej: Anillo de oro..." value="{{ request('buscar') }}">
            </div>

            {{-- 2. Selector Desplegable de Categorías --}}
            <div class="col-md-3">
                <label class="form-label small text-uppercase text-muted fw-semibold">Categoría</label>
                <select name="categoria_id" class="form-select text-dark">
                    <option value="">Todas las categorías</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ request('categoria_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nombre_categoria }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Selector Desplegable de Orden de Precios -->
            <div class="col-md-3">
                <label class="form-label small text-uppercase text-muted fw-semibold">Ordenar por precio</label>
                <select name="orden_precio" class="form-select text-dark">
                    <option value="">Por defecto</option>
                    <option value="asc" {{ request('orden_precio') == 'asc' ? 'selected' : '' }}>Menor a Mayor</option>
                    <option value="desc" {{ request('orden_precio') == 'desc' ? 'selected' : '' }}>Mayor a Menor</option>
                </select>
            </div>

            <!--Botones para Ejecutar o Limpiar -->
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-dark w-100 text-uppercase small fw-semibold">Filtrar</button>
                <a href="{{ route('catalogo1') }}" class="btn btn-outline-secondary w-100 text-uppercase small">Limpiar</a>
            </div>
        </form>
    </div>

        <!-- BUCLE: Recorre los productos que manda el controlador desde DBeaver -->
         <!-- NI A EL LE RECE TANTO PARA QUE FUNCIONE-->
        @foreach($productos as $joya)
            <div class="col-md-4 text-center">
                <!-- Mantenemos tu clase original y aseguramos el position-relative -->
                <div class="producto-card rounded-2 p-3 position-relative">
                    
                    <!--  BOTÓN DEL CORAZÓN FLOTANTE Y DINÁMICO -->
                    <div class="position-absolute top-0 end-0 p-3" style="z-index: 10;">
                        <form action="{{ route('cliente.favoritos.agregar') }}" method="POST">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $joya->id }}">
                            
                            <!-- Burbuja blanca con sombra para que el corazón resalte sobre cualquier foto -->
                            <button type="submit" class="btn p-0 border-0 rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                                    title="Agregar a mi lista de deseos"
                                    style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.9); transition: transform 0.2s;">
                                
                                <!--Consulta directa en DBeaver desde Blade -->
                                @php
                                    $esFavorito = \Illuminate\Support\Facades\DB::table('favoritos')
                                        ->where('usuario_id', auth()->id())
                                        ->where('producto_id', $joya->id)
                                        ->exists();
                                @endphp

                                @if($esFavorito)
                                    <!-- Si ya es favorito: Corazón lleno color bordo ALBA -->
                                    <span style="color: #300403; font-size: 1.3rem; line-height: 1;">♥</span>
                                @else
                                    <!-- Si no es favorito: Corazón vacio original -->
                                    <span class="text-dark" style="font-size: 1.3rem; line-height: 1;">♡</span>
                                @endif

                            </button>
                        </form>
                    </div>

                    <!-- Foto con enlace dinámico al detalle -->
                    <a href="{{ route('catalogo.producto.show', $joya->id) }}">
                        @if($joya->url_imagen)
                            <img src="{{ asset($joya->url_imagen) }}" class="object-fit-cover mb-3 rounded-2 w-100" alt="{{ $joya->nombre_joya }}" style="height: 250px;">
                        @else
                            <img src="{{ asset('img/Catalogo/Pagina1/Anillo1.png') }}" class="object-fit-cover mb-3 rounded-2 w-100" alt="Joyas ALBA" style="height: 250px;">
                        @endif
                    </a>

                    <!-- Datos del producto reales -->
                    <h5 class="nombre-joya mt-2 fw-bold text-dark">{{ $joya->nombre_joya }}</h5>
                    <p class="precio-joya text-secondary">$ {{ number_format($joya->precio_unitario, 2, ',', '.') }}</p>
                    
                </div>
            </div>
        @endforeach
    </div>

    <!-- SE CAMBIARON LOS BOTONES-->
    <nav aria-label="Navegacion catalogo" class="mt-5 mb-5">
        <ul class="pagination justify-content-center gap-3" style="border: none;">
            
            <!-- Boton Anterior: Se apaga solo si estamos en la página 1 -->
            <li class="page-item {{ $productos->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link text-dark fw-light" href="{{ $productos->previousPageUrl() }}" style="background: none; border: none;">Anterior</a>
            </li>

            <!-- Numero 1: Se resalta en negrita si estás en la página 1 -->
            <li class="page-item">
                <a class="page-link {{ $productos->currentPage() == 1 ? 'fw-bold text-decoration-underline' : 'text-dark fw-light' }}" href="{{ $productos->url(1) }}" style="background: none; border: none;"> 1 </a>
            </li>

            <!-- Numero 2: Solo aparece si realmente hay más de 9 productos en DBeaver -->
            @if($productos->hasMorePages() || $productos->currentPage() == 2)
                <li class="page-item">
                    <a class="page-link {{ $productos->currentPage() == 2 ? 'fw-bold text-decoration-underline' : 'text-dark fw-light' }}" href="{{ $productos->url(2) }}" style="background: none; border: none;"> 2 </a>
                </li>
            @endif

            <!-- Boton Siguiente: Se apaga solo si ya no hay mas productos en la pagina siguiente -->
            <li class="page-item {{ !$productos->hasMorePages() ? 'disabled' : '' }}">
                <a class="page-link text-dark fw-light" href="{{ $productos->nextPageUrl() }}" style="background: none; border: none;">Siguiente</a>
            </li>
            
        </ul>
    </nav>
</div>

@endsection