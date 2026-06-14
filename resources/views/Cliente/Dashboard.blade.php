@extends('Plantillas/plantilla-principal')
@section('contenido')

<div class="container my-5" style="font-family: 'Montserrat', sans-serif;">
    
    {{-- Saludo de bienvenida usando la variable $usuario que mandó el controlador --}}
    <div class="mb-5 border-bottom pb-3">
        <h2 class="fw-bold text-dark text-uppercase tracking-wider">Mi Cuenta</h2>
        <p class="text-muted">¡Hola de nuevo, <span class="fw-semibold text-dark">{{ $usuario->name }}</span>! Este es tu espacio de control en ALBA.</p>
    </div>

    <div class="row g-5">
        
        {{-- COLUMNA 1: PERFIL (DATOS DEL CLIENTE) --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4" style="background-color: #fdfbf7; border-radius: 8px;">
                <div class="text-center mb-4">
                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 65px; height: 65px; font-size: 1.5rem; font-weight: bold;">
                        {{ strtoupper(substr($usuario->name, 0, 1)) }}
                    </div>
                    <h5 class="fw-bold mb-0 text-dark">{{ $usuario->name }}</h5>
                    <span class="badge bg-secondary small mt-1 text-uppercase" style="font-size: 0.65rem;">Cliente Registrado</span>
                </div>

                <hr class="opacity-10">

                <div class="mb-3">
                    <label class="small text-uppercase text-muted fw-bold d-block mb-1" style="font-size: 0.75rem;">Email</label>
                    <span class="text-dark">{{ $usuario->email }}</span>
                </div>

                <div class="mb-3">
                    <label class="small text-uppercase text-muted fw-bold d-block mb-1" style="font-size: 0.75rem;">Cliente desde</label>
                    <span class="text-dark">{{ $usuario->created_at->format('d/m/Y') }}</span>
                </div>

                <div class="mt-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100 text-uppercase fw-semibold py-2">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- COLUMNA 2: HISTORIAL DE ÓRDENES (RECORRE $misOrdenes) --}}
        <div class="col-lg-8">
            <h4 class="fw-bold text-dark text-uppercase tracking-wide mb-4" style="font-size: 1rem;">Mis Órdenes de Compra</h4>
            
            {{-- Recorremos de forma dinámica las órdenes de DBeaver --}}
            @forelse($misOrdenes as $orden)
                <div class="card mb-3 border-0 shadow-sm p-3 bg-white" style="border-left: 4px solid #300403 !important;">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <span class="small text-muted d-block text-uppercase" style="font-size: 0.7rem;">Código</span>
                            <span class="fw-bold text-dark">#{{ str_pad($orden->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="col-md-3">
                            <span class="small text-muted d-block text-uppercase" style="font-size: 0.7rem;">Fecha</span>
                            <span class="text-dark small">{{ $orden->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="col-md-3">
                            <span class="small text-muted d-block text-uppercase" style="font-size: 0.7rem;">Total</span>
                            <span class="fw-bold text-dark">$ {{ number_format($orden->total, 2, ',', '.') }}</span>
                        </div>
                        <div class="col-md-3 text-md-end">
                            {{-- Ponemos un color al badge según el estado de la orden --}}
                            <span class="badge text-uppercase p-2" style="font-size: 0.65rem; background-color: #300403;">
                                {{ $orden->estado ?? 'Procesada' }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Si el usuario no tiene filas en la tabla ordenes, se muestra este cartel --}}
                <div class="card border-0 shadow-sm p-5 text-center bg-light rounded-3">
                    <span style="font-size: 2.5rem;">🛍️</span>
                    <h5 class="mt-3 fw-bold text-dark">¿No tenés compras guardadas?</h5>
                    <p class="text-muted small mx-auto mb-4" style="max-width: 400px;">
                        Tus pedidos aparecerán acá una vez que finalices tus compras en el carrito de joyas.
                    </p>
                    <div>
                        <a href="{{ route('catalogo1') }}" class="btn btn-dark text-uppercase small fw-semibold px-4 py-2">
                            Explorar Joyas
                        </a>
                    </div>
                </div>
            @endforelse 
        </div>

    </div>
</div>

@endsection