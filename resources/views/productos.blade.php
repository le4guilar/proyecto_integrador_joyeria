@extends('plantilla-principal')
@section('contenido')

<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-about-title"> ANILLOS </h1>
        <p clas="text-alba-bordo"> Colecion Oro Blanco & Platino </p>
    </div>

    <div class="row g-5">
        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/Anillo1.jpeg') }}" class="img-fluid mb-3" alt="Anillo">
                <h5 class="nombre-joya">Anillo Cruzado Brillante de Oro Blanco</h5>
                <p class="precio-joya">$ 51.634,94</p>
                <a href="#" class="btn-ver-mas">Ver Detalles</a>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/Anillo2.jpeg') }}" class="img-fluid mb-3" alt="Anillo">
                <h5 class="nombre-joya">Anillo Ondas Lumière</h5>
                <p class="precio-joya">$ 51.634,94</p>
                <a href="#" class="btn-ver-mas">Ver Detalles</a>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="producto-card">
                <img src="{{ asset('img/Catalogo/Anillo3.jpeg') }}" class="img-fluid mb-3" alt="Anillo">
                <h5 class="nombre-joya">Anillo Multibanda Élite</h5>
                <p class="precio-joya">$ 51.634,94</p>
                <a href="#" class="btn-ver-mas">Ver Detalles</a>
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