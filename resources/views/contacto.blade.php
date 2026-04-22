

@extends('plantilla-principal')

@section('contenido')


<div class="text-center mb-5 mt-5">
        <h6 class="text-uppercase mb-3" style="letter-spacing: 4px; color: #300403; font-weight: 600;">Servicios</h6>
        <h2 style="font-family: 'Cormorant Garamond', serif;" class="display-5 text-dark">Contacto</h2>
        <hr class="mx-auto" style="width: 60px; opacity: 0.2; color: #300403;">
</div>

<div class="container mt-5">
    <div class="card p-4 border rounded-2  bg-joyeria-form">
        <form>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control bg-joyeria-input" id="nombre">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control bg-joyeria-input" id="email">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control bg-joyeria-input" id="apellido">
                </div>
                <div class="col-md-6">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="tel" class="form-control bg-joyeria-input" id="telefono">
                </div>
            </div>

            <div class="mb-3">
                <label for="consulta" class="form-label">Consulta:</label>
                <textarea class="form-control bg-joyeria-input" id="consulta" rows="4"></textarea>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>
        </form>
    </div>
</div>    
<hr class="mx-auto mt-4" style="width: 60px; opacity: 0.2; color: #300403;">

@endsection