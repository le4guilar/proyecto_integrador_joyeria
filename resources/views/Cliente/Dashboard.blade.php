@extends('Plantillas/plantilla-principal')
@section('contenido')


<div class="container my-5" style="font-family: 'Montserrat', sans-serif;">
    <div class="row g-4">
        
        <div class="col-lg-3 border-end">
            <div class="mb-4 px-3">
                <span class="text-muted small text-uppercase tracking-wider" style="font-size: 0.75rem;">Mi cuenta</span>
                <h5 class="fw-bold text-dark mt-1">{{ $usuario->nombre }}</h5>
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
                    <h4 class="fw-bold text-dark mb-1">Hola, {{ $usuario->nombre }}!</h4>
                    <p class="text-muted small mb-4">Desde tu panel podés ver tu actividad reciente y gestionar tu seguridad.</p>

                    <!-- MENSAGE DE EXITO: Se muestra si la contraseña se cambio bien -->
                    @if (session('status'))
                    <div class="alert alert-success small p-2 rounded-3 mb-4" role="alert">
                        {{ session('status') }}
                        </div>
                    @endif

                    <!-- ERRORES DE VALIDACION: Se muestra si pusieron mal la clave actual o no coinciden -->
                    @if ($errors->any())
                        <div class="alert alert-danger small p-2 rounded-3 mb-4" role="alert">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card border-0 bg-light p-4 rounded-3 shadow-sm h-100">
                                <h6 class="fw-bold text-muted small text-uppercase tracking-wider mb-3" style="font-size: 0.75rem;">Información de contacto</h6>
                                <p class="fw-bold text-dark mb-1">{{ $usuario->nombre }}</p>
                                <p class="text-muted small mb-0">{{ $usuario->email }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card border-0 bg-light p-4 rounded-3 shadow-sm h-100">
                                <h6 class="fw-bold text-muted small text-uppercase tracking-wider mb-3" style="font-size: 0.75rem;">Seguridad de la cuenta</h6>

                                <!-- texto inicial: para ver primero la opcion de modificar contraseña-->
                                 <div id="texto-seguridad">
                                    <p class="text-muted small mb-4">Mantené tu cuenta protegida actualizando tu contraseña de acceso de forma periódica.</p>

                                    <!-- boton para abrir el formulario para cambiar la contraseña-->
                                    <button type="button" class="btn btn-dark text-uppercase small fw-semibold w-100"
                                        data-bs-toggle="collapse" data-bs-target="#formulario-contraseña"
                                        aria-expanded="false" aria-controls="formulario-contraseña"
                                        onclick="document.getElementById('texto-seguridad').style.display='none'">
                                        Modificar contraseña
                                    </button>
                                 </div>

                                 <!-- luego el formulario de despliega-->
                                <div class="collapse" id="formulario-contraseña">
                                    <form action="{{ route('cliente.update-password') }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <div class="mb-2">
                                            <label class="small text-muted fw-semibold mb-1">Contraseña actual</label>                                        
                                            <input type="password" name="current_password" class="form-control form-control-sm bg-white" placeholder="Ingresá tu clave actual" required>                                         
                                        </div>

                                        <div class="mb-2">
                                            <label class="small text-muted fw-semibold mb-1">Nueva contraseña</label>
                                            <input type="password" name="password" class="form-control form-control-sm bg-white" placeholder="Mínimo 8 caracteres" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="small text-muted fw-semibold mb-1">Confirmar nueva contraseña</label>                                        
                                            <input type="password" name="password_confirmation" class="form-control form-control-sm bg-white" placeholder="Mínimo 8 caracteres" required>                                            
                                        </div>

                                        <div class="d-flex gap-2">
                                            <!--Boton de cancelar por si el usuario se arrepiente-->
                                            <button type="button" class="btn btn-outline-secondary text-uppercase small fw-semibold w-50"
                                                data-bs-toggle="collapse" data-bs-target="#formulario-contraseña"
                                                onclick="document.getElementById('texto-seguridad').style.display='block'">
                                                Cancelar
                                            </button>

                                            <!-- Boton que envia los datos al ClienteController-->
                                            <button type="submit" class="btn btn-dark text-uppercase small fw-semibold w-50">
                                                Actualizar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CONTENIDO 1: Información Personal -->
               <div class="tab-pane fade" id="info-personal" role="tabpanel" aria-labelledby="info-tab">
                    <h4 class="fw-bold text-dark mb-4">Información personal</h4>
                    
                    <!-- Mensajes de exito -->
                    @if (session('status'))
                        <div class="alert alert-success small p-2 rounded-3 mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card border-0 bg-light p-4 rounded-3 shadow-sm" style="max-width: 500px;">
                        
                        <!-- VISTA DE LECTURA -->
                        <div id="vista-perfil">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-uppercase text-muted">Nombre Completo</label>
                                <div class="form-control bg-white text-dark border-0 py-2 shadow-sm">{{ $usuario->nombre }}</div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-uppercase text-muted">Correo Electrónico</label>
                                <div class="form-control bg-white text-dark border-0 py-2 shadow-sm">{{ $usuario->email }}</div>
                            </div>
                            
                            <button type="button" class="btn btn-dark text-uppercase small fw-semibold w-100" 
                                    data-bs-toggle="collapse" data-bs-target="#formulario-perfil" 
                                    aria-expanded="false" aria-controls="formulario-perfil"
                                    onclick="document.getElementById('vista-perfil').style.display='none'">
                                Editar Perfil
                            </button>
                        </div>

                        <!-- VISTA DE EDICION (Oculta al principio) -->
                        <div class="collapse" id="formulario-perfil">
                            <form action="{{ route('cliente.update-perfil') }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-uppercase text-muted">Nombre Completo</label>
                                    <input type="text" name="nombre" class="form-control bg-white" value="{{ $usuario->nombre }}" required>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-uppercase text-muted">Correo Electrónico</label>
                                    <input type="email" name="email" class="form-control bg-white" value="{{ $usuario->email }}" required>
                                </div>
                                
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-secondary text-uppercase small fw-semibold w-50" 
                                            data-bs-toggle="collapse" data-bs-target="#formulario-perfil"
                                            onclick="document.getElementById('vista-perfil').style.display='block'">
                                        Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-dark text-uppercase small fw-semibold w-50">
                                        Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- CONTENIDO 2: Mi lista de deseos -->
                <div class="tab-pane fade" id="lista-deseos" role="tabpanel" aria-labelledby="deseos-tab">
                    <h4 class="fw-bold text-dark mb-4">Mi lista de deseos</h4>

                    @if(isset($misFavoritos) && $misFavoritos->count() > 0)
                        <div class="row g-4">
                            @foreach($misFavoritos as $favorito)
                                <div class="col-md-4">
                                    <div class="card h-100 border-0 shadow-sm position-relative rounded-3 bg-white">
                                        
                                        <div class="position-absolute top-0 end-0 p-2" style="z-index: 10;">
                                            <form action="{{ route('cliente.favoritos.eliminar', $favorito->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm bg-transparent border-0" title="Eliminar de favoritos">
                                                    <span class="text-danger fw-bold" 
                                                        style="font-size: 1.5rem; line-height: 1; -webkit-text-stroke: 1px #32070c;">
                                                            <i class="bi bi-x text-alba-bordo fs-4"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>

                                        @if($favorito->producto && $favorito->producto->url_imagen)
                                            <img src="{{ asset($favorito->producto->url_imagen) }}" class="card-img-top rounded-top-3" alt="{{ $favorito->producto->nombre_joya }}" style="height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('img/Catalogo/Pagina1/Anillo1.png') }}" class="card-img-top rounded-top-3" alt="Joyas ALBA" style="height: 200px; object-fit: cover;">
                                        @endif
                                        
                                        <div class="card-body d-flex flex-column justify-content-between p-3">
                                            <div>
                                                <!-- Se corrigieron algunos nombres que estaban mal -->
                                                <h6 class="fw-bold text-dark mb-1">{{ $favorito->producto->nombre_joya ?? 'Joya ALBA' }}</h6>
                                                <p class="text-muted small mb-2">$ {{ number_format($favorito->producto->precio_unitario ?? 0, 2, ',', '.') }}</p>
                                            </div>
                                            
                                            <a href="{{ route('catalogo.producto.show', $favorito->producto_id) }}" class="btn btn-dark btn-sm text-uppercase small fw-semibold w-100 mt-2">
                                                Ver Joya
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="card border-0 shadow-sm p-5 text-center bg-light rounded-3">
                            <span style="font-size: 2.5rem;">
                                <i class="bi bi-heart-fill"></i>
                            </span>
                            <h5 class="mt-3 fw-bold text-dark">Tu lista de deseos está vacía</h5>
                            <p class="text-muted small mx-auto mb-4" style="max-width: 400px;">
                                Guardá las joyas que más te enamoren mientras explorás nuestro catálogo para tenerlas siempre a mano.
                            </p>
                            <div>
                                <a href="{{ route('catalogo1') }}" class="btn btn-dark text-uppercase small fw-semibold px-4 py-2">
                                    Buscar Joyas
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- CONTENIDO 3: Mis pedidos -->
                <div class="tab-pane fade" id="mis-pedidos" role="tabpanel" aria-labelledby="pedidos-tab">
                    <h4 class="fw-bold text-dark mb-4">Mis pedidos</h4>

                    <!-- Recorremos de forma dinamica las ordenes de DBeaver -->
                    @forelse($misOrdenes as $orden)
                        <div class="card mb-3 border-0 shadow-sm p-3 bg-white border-start border-dark border-4 rounded-3">
                            <div class="row align-items-center g-3">
                                
                                <!-- Codigo del Pedido -->
                                <div class="col-md-3">
                                    <span class="small text-muted d-block text-uppercase fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.5px;">Código</span>
                                    <span class="fw-bold text-dark">#{{ str_pad($orden->id, 5, '0', STR_PAD_LEFT) }}</span>
                                </div>

                                <!--Fecha de la Compra -->
                                <div class="col-md-3">
                                    <span class="small text-muted d-block text-uppercase fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.5px;">Fecha</span>
                                    <span class="text-secondary small fw-medium">
                                        {{ $orden->created_at ? $orden->created_at->format('d/m/Y') : 'Reciente' }}
                                    </span>
                                </div>

                                <!-- Total de la Orden -->
                                <div class="col-md-3">
                                    <span class="small text-muted d-block text-uppercase fw-semibold" style="font-size: 0.65rem; letter-spacing: 0.5px;">Total</span>
                                    <span class="fw-bold text-dark">$ {{ number_format($orden->total ?? 0, 2, ',', '.') }}</span>
                                </div>

                                {{-- 🏷️ Estado del Pedido Inteligente con Colores Dinámicos --}}
                                <div class="col-md-3 text-md-end">
                                    <span class="small text-muted d-block text-md-end text-start text-uppercase fw-semibold mb-1" style="font-size: 0.65rem; letter-spacing: 0.5px;">Estado</span>
                                    
                                    @php
                                        // Rescatamos el texto del estado de forma segura (rompiendo el objeto)
                                        $nombreEstado = 'Pagado'; // Valor por defecto
                                        if (isset($orden->estado) && is_object($orden->estado)) {
                                            $nombreEstado = $orden->estado->nombre_estado_orden;
                                        } elseif (isset($orden->estado) && is_array($orden->estado)) {
                                            $nombreEstado = $orden->estado['nombre_estado_orden'];
                                        } elseif (isset($orden->estado)) {
                                            $nombreEstado = $orden->estado;
                                        }

                                        // Evaluamos el texto y ponemos el color de fondo y de letra
                                        // Limpiamos espacios o mayusculas por las dudas con el helper Str::slug o pasandolo a minusculas
                                        $estadoLimpio = mb_strtolower(trim($nombreEstado));
                                        
                                        if ($estadoLimpio == 'pagado' || $estadoLimpio == 'aprobado') {
                                            $bgBadge = 'background-color: #286b38; color: #ffffff;'; 
                                        } elseif ($estadoLimpio == 'en camino' || $estadoLimpio == 'despachado') {
                                            $bgBadge = 'background-color: #300403; color: #dfdada;'; 
                                        } elseif ($estadoLimpio == 'entregado' || $estadoLimpio == 'finalizado') {
                                            $bgBadge = 'background-color: #6c757d; color: #ffffff;'; 
                                        } elseif ($estadoLimpio == 'cancelado' || $estadoLimpio == 'rechazado') {
                                            $bgBadge = 'background-color: #871b26; color: #ffffff;'; 
                                        } else {
                                            $bgBadge = 'background-color: #a78829; color: #212529;'; //"Pendiente"
                                        }
                                    @endphp

                                    <!-- Dibujamos el Badge con el estilo dinamico calculado arriba -->
                                    <span class="badge px-3 py-1.5 rounded-pill small fw-semibold" style="{{ $bgBadge }} font-size: 0.75rem;">
                                        {{ $nombreEstado }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!--Si el usuario no tiene filas en la tabla ordenes de DBeaver, se muestra este cartel -->
                        <div class="card border-0 shadow-sm p-5 text-center bg-light rounded-3">
                            <span style="font-size: 2.5rem;">
                                <i class="bi bi-bag"></i>
                            </span>
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
    </div>
</div>

@endsection