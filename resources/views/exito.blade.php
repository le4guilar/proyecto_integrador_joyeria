@extends('plantilla-principal')

@section('contenido')



<div>
    <p class="lead fw-5">
        Hola <strong>{{ $nombre }}</strong>, qué bueno recibir tu mensaje. Un miembro del equipo de ventas se pondrá en contacto con vos al correo: <strong>{{ $email }}</strong> ¡Muchas gracias!
    </p>
</div>





@endsection