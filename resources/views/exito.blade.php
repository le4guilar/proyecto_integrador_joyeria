@extends('plantilla-principal')

@section('contenido')


<div class="text-center mb-5 mt-5">
    <h6 class="text-uppercase mb-3" style="letter-spacing: 4px; color: #300403; font-weight: 600;">ALBA </h6>
    <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Contacto</h2>
    <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
</div>


<div class="container py-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-5 border rounded bg-exito-card">
                <i class="bi bi-check-circle text-success display-1 mb-4"></i>
                <img class="img-fluid mx-auto d-block" src="{{ asset('img/contacto/envelope-check.svg') }}" alt="confirmación" width="60">
                <h1 class="mb-3 h1-exito">¡Gracias por contactarnos, <b>{{ $nombre }}</b>!</h1>
                
                <p class="mb-4 p-exito">
                    Hemos recibido tu consulta correctamente. En breve nos pondremos en contacto contigo a través de <strong>{{ $email }}</strong>.
                </p>

                
                
                <p class="text-muted small">Atentamente, el equipo de ALBA Joyería.</p>
                
                <div class="mt-4">
                    <a href="{{ url('/home') }}" class="btn btn-exito px-4 py-2">I N I C I O</a>
                </div>
            </div>
        </div>
    </div>
</div>


<hr class="mx-auto mt-4" style="width: 60px; opacity: 0.2; color: #300403;">


@endsection