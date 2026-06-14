@extends('Plantillas/plantilla-principal')
@section('contenido')
@vite(['resources/css/app.css', 'resources/js/app.js'])


<div class="container my-5" style="font-family: 'Montserrat', sans-serif;">
    <div class="row g-4">
        
        <div class="col-lg-3 border-end">
            <div class="mb-4 px-3">
                <span class="text-muted small text-uppercase tracking-wider" style="font-size: 0.75rem;">Mi cuenta</span>
                <h5 class="fw-bold text-dark mt-1">{{ $usuario->name }}</h5>
            </div>
            
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <!-- OPCION 1: Mi Panel de Control -->
                <button class="nav-link active text-start rounded-0 border-bottom py-3 px-3 custom-tab-btn" id="panel-tab" data-bs-toggle="pill" data-bs-target="#panel-control" type="button" role="tab" aria-controls="panel-control" aria-selected="true">
                    Mi panel de control
                </button>
                
                <!-- OPCION 2: Información Personal -->
                <button class="nav-link text-start rounded-0 border-bottom py-3 px-3 custom-tab-btn" id="info-tab" data-bs-toggle="pill" data-bs-target="#info-personal" type="button" role="tab" aria-controls="info-personal" aria-selected="false">
                    Información personal
                </button>
                
                <!-- OPCION 2: Mi lista de deseos -->
                <button class="nav-link text-start rounded-0 border-bottom py-3 px-3 custom-tab-btn" id="deseos-tab" data-bs-toggle="pill" data-bs-target="#lista-deseos" type="button" role="tab" aria-controls="lista-deseos" aria-selected="false">
                    Mi lista de deseos
                </button>
                
                <!-- OPCION 3: Mis pedidos -->
                <button class="nav-link text-start rounded-0 border-bottom py-3 px-3 custom-tab-btn" id="pedidos-tab" data-bs-toggle="pill" data-bs-target="#mis-pedidos" type="button" role="tab" aria-controls="mis-pedidos" aria-selected="false">
                    Mis pedidos <span class="badge bg-dark rounded-circle ms-2">{{ $misOrdenes->count() }}</span>
                </button>

                <!-- OPCION 4: Cerrar Sesión (Usa la ruta de logout que ya tienen) -->
                <form action="{{ route('logout') }}" method="POST" class="mt-4 px-3">
                    @csrf
                    <button type="submit" class="btn btn-link text-danger text-decoration-none p-0 small text-uppercase fw-semibold" style="font-size: 0.8rem;">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>

        <div class="col-lg-9 ps-lg-5">
            <div class="tab-content" id="v-pills-tabContent">

                <!-- CONTENIDO 1: panel del control -->
                <div class="tab-pane fade show active" id="panel-control" role="tabpanel" aria-labelledby="panel-tab">
                    <h4 class="fw-bold text-dark mb-1">Hola, {{ $usuario->name }}!</h4>
                    <p class="text-muted small mb-4">Desde tu panel podés ver tu actividad reciente y gestionar tu seguridad.</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card borde-0 bg-loght p-4 rounded-3 shadow-sm h-100">
                                <h6 class="fw-bold text-muted small text-uppercase tracking-wider mb-3" style="font-size: 0.75rem;">Seguridad de la cuenta</h6>
                                <p class="text-muted small mb-3">Mantené tu cuenta protegida actualizando tu contraseña de acceso.</p>

                                <button type="button" class="btn btn-dark text-uppercase small fw-semibold" style="font-size: 0.8rem;">
                                    Modificar Contraseña
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- CONTENIDO 1: Información Personal -->
                <div class="tab-pane fade" id="info-personal" role="tabpanel">
                    <h4 class="fw-bold text-dark mb-4">Información personal</h4>
                    
                    <div class="card border-0 bg-light p-4 rounded-3 shadow-sm" style="max-width: 500px;">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">Nombre Completo</label>
                            <input type="text" class="form-control bg-white" value="{{ $usuario->name }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">Correo Electrónico</label>
                            <input type="email" class="form-control bg-white" value="{{ $usuario->email }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted" style="font-size: 0.75rem;">Cliente desde</label>
                            <input type="text" class="form-control bg-white" value="{{ $usuario->created_at->format('d/m/Y') }}" readonly>
                        </div>
                        
                        <div class="mt-3">
                            <button class="btn btn-outline-dark text-uppercase small fw-semibold">Editar Perfil</button>
                        </div>
                    </div>
                </div>

                <!-- CONTENIDO 2: Mi lista de deseos -->
                <div class="tab-pane fade" id="lista-deseos" role="tabpanel">
                    <h4 class="fw-bold text-dark mb-3">Mi lista de deseos</h4>
                    <p class="text-muted small">Acá se guardarán tus joyas favoritas.</p>
                </div>

                <!-- CONTENIDO 3: Mis pedidos -->
                <div class="tab-pane fade" id="mis-pedidos" role="tabpanel">
                    <h4 class="fw-bold text-dark mb-3">Mis pedidos</h4>

                    <!-- Recorremos de forma dinamica las ordenes de DBeaver-->
                     @forelse($misOrdenes as $orden)
                     <div class="card mb-3 border-0 shadow-sm p-3 bg-white border-start border-dark border-4">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <span class="small text-muted d-block text-uppercase" style="font-size: 0.65rem;">Código</span>
                                <span class="fw-bold text-dark">#{{ str_pad($orden->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div class="col-md-3">
                                <span class="small text-muted d-block text-uppercase" style="font-size: 0.65rem;">Total</span>
                                {{ $orden->estado ?? 'Procesado' }}</span>
                            </div>
                        </div>
                     </div>
                    @empty
                    <!-- Si el usuario no tiene filas en la tabla ordenes de DBeaver, se muestra este cartel -->
                     <div class="card border-0 shadow-sm p-5 text-center bg-light rounded-3">
                        <span style="font-size: 2.5rem;">Pedidos</span>
                        <h5 class="mt-3 fw-bold text-dark">¿No tenés compras guardadas?</h5>
                        <p class="text-muted small mx-auto mb-4" style="max-width: 400px;">
                            Tus pedidos aparecerán acá una vez que finalices tus compras en el carrito de joyas.
                        </p>
                        <div>
                            <a href="{{ route('catalogo1') }}" class="btn btn-dark text-uppercase small fw-semibold px-4 py-2">
                                Explorar Joyas </a>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection