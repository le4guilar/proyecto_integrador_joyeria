
@extends('plantilla-principal')
@section('contenido')

<div class= "container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-about-tittle"> ANILLOS </h1>
        <p clas="text-alba-bordo"> Colecion Oro Blanco & Platino </p>
    </div>
    
    <div class="row g-5">
        <div class="col-md-4 texter-center">
            <img src="{{ asset('img/joyas/Anillo1.jpeg') }}" class="img-fluid mb-3" alt="Anillo">
            <h5 class="nombre-joya">Anillo Cruzado Brillante de Oro Blanco</h5>
            <p class="precio-joya">$ 51.634,94</p>
            <a href="#" class="btn-ver-mas">Ver Detalles</a>
        </div>
    </div>

    <div class="col-md-4 text-center">
        <div class="producto-card">
            <img src="{{ ('img/joyas/Anillo2.jpeg') }}" class="img-fluid mb-3" alt="Anillo">
            <h5 class="nombre-joya"> 
        </div>
    </div>

</div>




@endsection