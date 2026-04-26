@extends('plantilla-principal')
@section('contenido')

<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-about-title"> Colección Oro Blanco & Platino</h1>
        <p class="text-alba-bordo"> ANILLOS </p>
    </div>

    <div class="row g-5">
        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/Anillo1.png') }}" class="img-fluid mb-3" alt="Anillo">
                <h5 class="nombre-joya">Anillo Cruzado Brillante de Oro Blanco</h5>
                <p class="precio-joya">$ 51.634,94</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/Anillo2.png') }}" class="img-fluid mb-3" alt="Anillo">
                <h5 class="nombre-joya">Anillo "Ondas Lumière"</h5>
                <p class="precio-joya">$ 51.634,94</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/Anillo3.png') }}" class="img-fluid mb-3" alt="Anillo">
                <h5 class="nombre-joya">Anillo "Multibanda Élite"</h5>
                <p class="precio-joya">$ 51.634,94</p>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="text-center mb-5">
        <p class="text-alba-bordo"> ARETES </p>
    </div>

    <div class="row g-5">
        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/arete1.png') }}" class="img-fluid mb-3" alt="Arete">
                <h5 class="nombre-joya">Argolla "Huggies Eternity"</h5>
                <p class="precio-joya">$ 42.500,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/arete2.png') }}" class="img-fluid mb-3" alt="Arete">
                <h5 class="nombre-joya">Aros "Ondas Platino"</h5>
                <p class="precio-joya">$ 38.900.00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/arete3.png') }}" class="img-fluid mb-3" alt="Anillo">
                <h5 class="nombre-joya">Pendientes "Gotas de luz"</h5>
                <p class="precio-joya">$ 45.200,00</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="text-center mb-5">
        <p class="text-alba-bordo"> PULSERAS </p>
    </div>

    <div class="row g-5">
        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/Pulsera1.png') }}" class="img-fluid mb-3" alt="Pulsera">
                <h5 class="nombre-joya">Brazalete "Destello Infinito"</h5>
                <p class="precio-joya">$ 65,800,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/Pulsera2.png') }}" class="img-fluid mb-3" alt="Pulsera">
                <h5 class="nombre-joya">Esclava "Ondas de Plata"</h5>
                <p class="precio-joya">$ 48.200,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/Pulsera3.png') }}" class="img-fluid mb-3" alt="Pulsera">
                <h5 class="nombre-joya">Pulsera Tennis "Élite Diamond"</h5>
                <p class="precio-joya">$ 72,500,00</p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="text-center mb-5">
        <p class="text-alba-bordo"> COLLARES </p>
    </div>

    <div class="row g-5">
        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/collar1.png') }}" class="img-fluid mb-3" alt="Collar">
                <h5 class="nombre-joya">Gargantilla "Solitario Astral</h5>
                <p class="precio-joya">$ 53,900,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/collar2.png') }}" class="img-fluid mb-3" alt="Collar">
                <h5 class="nombre-joya">Collar Multiplaca "Rocío de Luna"</h5>
                <p class="precio-joya">$ 58.900,00</p>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/collar3.png') }}" class="img-fluid mb-3" alt="Collar">
                <h5 class="nombre-joya">Collar Tennis "Brillo Supremo"</h5>
                <p class="precio-joya">$ 85.600,00</p>
            </div>
        </div>
    </div>

    <nav aria-label="Navegacion catalogo" class="mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item disable"><a class="page-link" href="#">Anterior</a></li>

            <li class="page-item active"> <a class="page-link" href="#"> 1 </a> </li>
            <li class="page-item active"> <a class="page-link" href="#"> 2 </a> </li>
            <li class="page-item"> <a class="page-link" href="#"> Siguiente </a> </li>
        </ul>
    </nav>
</div>




@endsection