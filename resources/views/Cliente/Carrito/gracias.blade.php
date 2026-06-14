@extends('Plantillas/plantilla-principal')

@section('contenido')
<div class="container my-5 py-5" style="font-family: 'Montserrat', sans-serif;">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center bg-light p-5 rounded shadow-sm">
            <div class="mb-4">
                <span style="font-size: 5rem;">✨</span>
            </div>
            
            <h1 class="fw-bold text-dark mb-3" style="letter-spacing: -1px;">¡Gracias por tu compra!</h1>
            
            <p class="text-muted fs-5 mb-4">
                Tu orden ha sido generada con éxito. Ya comenzamos a preparar tus joyas de ALBA.
            </p>

            <hr class="my-4">

            <div class="d-grid gap-2 col-11 mx-auto">
                <a href="{{ route('catalogo1') }}" class="btn btn-dark btn-lg py-3 fw-bold text-uppercase shadow-sm" style="letter-spacing: 1px;">
                    Continuar Viendo Joyas
                </a>
                <a href="{{ route('cliente.dashboard') }}" class="btn btn-outline-secondary mt-2 border-2 fw-bold text-uppercase">
                    Ir a mi panel
                </a>
            </div>
        </div>
    </div>
</div>
@endsection