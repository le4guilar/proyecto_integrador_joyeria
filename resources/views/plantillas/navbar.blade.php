<nav class="navbar animacion-lenta navbar-expand-lg navbar-dark navbar-transparent">


    <!--botones-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon">
        </span>
    </button>

    <div class="nav-joyeria collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link px-3" href="/home">
                    ALBA
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link px-3" href="/catalogo1">
                    Catálogo
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link px-3" href="/nosotros">
                    Nosotros
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link px-3" href="/comercializacion">
                    Comercialización
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link px-3" href="/terminos-de-uso">
                    Términos de uso
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link px-3" href="/contacto">
                    Contacto
                </a>

            </li>
        
            <!-- SI EL USUARIO ESTA LOGUEADO -->
            @auth
                <!-- Icono de Mi Cuenta (Dashboard) -->
                <li class="nav-item">
                    <a class="nav-link px-3 fs-5" href="{{ route('cliente.dashboard') }}" title="Mi Cuenta">
                        <i class="bi bi-person"></i>
                    </a>
                </li>

                <!-- Control de Carrito / Admin con iconos -->
                <li class="nav-item">
                    @if(auth()->user()->rol_id === 1)
                        <a class="nav-link px-3 text-uppercase small fw-bold" href="/admin">Panel Admin</a>
                    @else
                        <!-- Icono de bolsa de compras fina para el cliente -->
                        <a class="nav-link px-3 fs-5" href="/carrito" title="Mi Carrito">
                            <i class="bi bi-bag"></i>
                        </a>
                    @endif
                </li>

                <!-- Boton Salir -->
                <li class="nav-item">
                    <form action="/logout" method="POST" style="display:inline;">
                        @csrf
                        {{-- Le sacamos el 'btn btn-link' y el 'style' para que no pise los colores --}}
                        <button type="submit" class="nav-link px-3">
                            Salir
                        </button>
                    </form>
                </li>

            <!-- SI NO HAY SESION INICIADA -->
            @else
                <li class="nav-item">
                    <a class="nav-link px-3" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/registro">Registrarse</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>