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
            
            <!--
            <li>
                @auth
                {{-- Solo se muestra si hay un usuario logueado --}}
                Hola, {{ auth()->user()->name }}
                @if(auth()->user()->rol === 'admin')
                {{-- Solo para admin --}}
                <a href="/admin">Panel Admin</a>
                @else
                {{-- Solo para clientes --}}
                <a href="/carrito">Mi carrito</a>
                @endif
                @else
                {{-- Solo se muestra si NO hay sesión --}}
                <a href="/Backend/Usuarios/logsin">Login</a>
                @endauth
            </li>
            -->
            @auth
            {{-- Solo se muestra si hay un usuario logueado (cambios: se hizo un panel de control) --}}
            <!--<li class="nav-item">
                <a class="nav-link text-uppercase fw-semibold" href="{{ route('cliente.dashboard') }}"> Mi Cuenta</a>
            </li>-->
            <li class="nav-item">
                @if(auth()->user()->rol_id === 1)
                <a class="nav-link px-3" href="/admin">Panel Admin</a>
                @else
                    <a class="nav-link text-uppercase fw-semibold" href="{{ route('cliente.dashboard') }}"> Mi Cuenta</a>

                @endif
            </li>

            {{-- Tip: Te sugiero agregar el botón de logout aquí --}}
            <li class="nav-item">
                <form action="/logout" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="nav-link px-3 btn btn-link" style="text-decoration:none;">Salir</button>
                </form>
            </li>
            @else
            {{-- Solo se muestra si NO hay sesión --}}
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