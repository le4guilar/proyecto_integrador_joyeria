@extends('plantilla-principal')
@section('contenido')

<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-about-title"> Colección Oro Blanco & Platino</h1>
        <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
        <p class="text-alba-bordo mt-3"> ANILLOS </p>
    </div>

    <div class="row g-5">
        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/anillo4.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Anillo">
                <h5 class="nombre-joya">Alianza "Estela Polar"</h5>
                <p class="precio-joya">$49.600,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/anillo5.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Anillo">
                <h5 class="nombre-joya">Anillo "Dualidad Nova"</h5>
                <p class="precio-joya">$ 52.100,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/anillo6.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Anillo">
                <h5 class="nombre-joya">Anillo "Marea de Plata"</h5>
                <p class="precio-joya">$ 55.300,00</p>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="text-center mb-5">
        <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
        <p class="text-alba-bordo"> ARETES </p>
    </div>

    <div class="row g-5">
        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/arete4.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Arete">
                <h5 class="nombre-joya">Aros "Cubo de Hielo "</h5>
                <p class="precio-joya">$ 42.500,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/arete5.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Arete">
                <h5 class="nombre-joya">Argolla "Eclipse Minimas"</h5>
                <p class="precio-joya">$ 40.000.00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/arete6.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Arete">
                <h5 class="nombre-joya">Aretes "Lágrima de Venus"</h5>
                <p class="precio-joya">$ 45.200,00</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="text-center mb-5">
        <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
        <p class="text-alba-bordo"> PULSERAS </p>
    </div>

    <div class="row g-5">
        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/pulsera4.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Pulsera">
                <h5 class="nombre-joya">Brazalete "Pulso Galáctico"</h5>
                <p class="precio-joya">$ 65,900,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/pulsera5.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Pulsera">
                <h5 class="nombre-joya">Pulsera "Vía Láctea"</h5>
                <p class="precio-joya">$ 48.200,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/pulsera6.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Pulsera">
                <h5 class="nombre-joya">Pulsera Tennis "Hebra de Diamante"</h5>
                <p class="precio-joya">$ 72,500,00</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="text-center mb-5">
        <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
        <p class="text-alba-bordo"> COLLARES </p>
    </div>

    <div class="row g-5">
        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/collar4.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Collar">
                <h5 class="nombre-joya">Collar "Halo de Luna</h5>
                <p class="precio-joya">$ 54,900,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/collar5.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Collar">
                <h5 class="nombre-joya">Gargantilla "Dúo Florar Blanco</h5>
                <p class="precio-joya">$ 60.000,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card rounded-2">
                <img src="{{ asset('img/Catalogo/Pagina2/collar6.png') }}" class="object-fit-cover mb-3 rounded-2" alt="Collar">
                <h5 class="nombre-joya">Collar "Cascada de Luz"</h5>
                <p class="precio-joya">$ 90.600,00</p>
            </div>
        </div>
    </div>

    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">

    <nav aria-label="Navegacion catalogo" class="mt-5 mb-5">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="{{ route('catalogo.p1') }}">Anterior</a>
            </li>

            <li class="page-item">
                <a class="page-link" href="{{ route('catalogo.p1') }}"> 1 </a>
            </li>

            <li class="page-item disabled">
                <a class="page-link" href="{{ route('catalogo.p2') }}"> 2 </a>
            </li>

            <li class="page-item disabled">
                <a class="page-link" href="#"> Siguiente </a>
            </li>
        </ul>
    </nav>
</div>
@endsection