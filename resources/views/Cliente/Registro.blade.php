@extends('Plantillas/plantilla-principal')

@section('contenido')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            
            <div class="card card-consultas border-0 rounded-0 p-4 p-md-5">
                
                <div class="text-center mb-5">
                    <h2 class="display-about-title text-uppercase mb-1" style="letter-spacing: 3px;">
                        Crear Cuenta
                    </h2>
                    <span class="text-alba-bordo d-block">
                        Únete a nuestra colección exclusiva
                    </span>
                </div>

                <form action="/registro" method="POST">
                    @csrf 

                    <div class="row">
                        {{-- Campo Nombre --}}
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label h6-comercializacion fw-bold text-uppercase tracking-wider">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control bg-joyeria-input rounded-0 @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                            @error('nombre') 
                                <small style="color: red;" class="d-block mt-1">{{ $message }}</small> 
                            @enderror
                        </div>

                        {{-- Campo Apellido --}}
                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label h6-comercializacion fw-bold text-uppercase tracking-wider">Apellido:</label>
                            <input type="text" name="apellido" id="apellido" class="form-control bg-joyeria-input rounded-0 @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}" required>
                            @error('apellido') 
                                <small style="color: red;" class="d-block mt-1">{{ $message }}</small> 
                            @enderror
                        </div>
                    </div>

                    {{-- Campo Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label h6-comercializacion fw-bold text-uppercase tracking-wider">Correo Electrónico:</label>
                        <input type="email" name="email" id="email" class="form-control bg-joyeria-input rounded-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="correo@mail.com" required>
                        @error('email') 
                            <small style="color: red;" class="d-block mt-1">{{ $message }}</small> 
                        @enderror
                    </div>

                    <hr class="my-4" style="border-color: #300403;">
                    <h5 class="h4-comercializacion mb-3" style="font-size: 1.4rem; letter-spacing: 1px;">Datos de Envío / Domicilio</h5>

                    <div class="row">
                        {{-- Selector de Provincia --}}
                        <div class="col-md-6 mb-3">
                            <label for="provincia_id" class="form-label h6-comercializacion fw-bold text-uppercase tracking-wider">Provincia:</label>
                            <select id="provincia_id" class="form-select bg-joyeria-input rounded-0" style="height: 40px;" required>
                                <option value="" style="color: #231f20;">Seleccione una...</option>
                                @foreach($provincias as $provincia)
                                    <option value="{{ $provincia->id }}" style="color: #231f20;">{{ $provincia->nombre_provincia }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Selector de Ciudad --}}
                        <div class="col-md-6 mb-3">
                            <label for="ciudad_id" class="form-label h6-comercializacion fw-bold text-uppercase tracking-wider">Ciudad / Capital:</label>
                            <select name="ciudad_id" id="ciudad_id" class="form-select bg-joyeria-input rounded-0 @error('ciudad_id') is-invalid @enderror" style="height: 40px;" required disabled>
                                <option value="" style="color: #231f20;">Primero elija provincia</option>
                            </select>
                            @error('ciudad_id') 
                                <small style="color: red;" class="d-block mt-1">{{ $message }}</small> 
                            @enderror
                        </div>
                    </div>

                    {{-- Campo Detalle Domicilio --}}
                    <div class="mb-3">
                        <label for="detalle_domicilio" class="form-label h6-comercializacion fw-bold text-uppercase tracking-wider">Dirección (Calle, Número, Piso):</label>
                        <input type="text" name="detalle_domicilio" id="detalle_domicilio" class="form-control bg-joyeria-input rounded-0 @error('detalle_domicilio') is-invalid @enderror" value="{{ old('detalle_domicilio') }}" placeholder="Calle Genérica 123" required>
                        @error('detalle_domicilio') 
                            <small style="color: red;" class="d-block mt-1">{{ $message }}</small> 
                        @enderror
                    </div>

                    <hr class="my-4" style="border-color: #300403;">
                    <h5 class="h4-comercializacion mb-3" style="font-size: 1.4rem; letter-spacing: 1px;">Seguridad de la Cuenta</h5>

                    <div class="row">
                        {{-- Campo Contraseña --}}
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label h6-comercializacion fw-bold text-uppercase tracking-wider">Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control bg-joyeria-input rounded-0 @error('password') is-invalid @enderror" required>
                            @error('password') 
                                <small style="color: red;" class="d-block mt-1">{{ $message }}</small> 
                            @enderror
                        </div>

                        {{-- Campo Confirmar Contraseña --}}
                        <div class="col-md-6 mb-4">
                            <label for="password_confirmation" class="form-label h6-comercializacion fw-bold text-uppercase tracking-wider">Confirmar Clave:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-joyeria-input rounded-0" required>
                        </div>
                    </div>

                    {{-- Botón Registrarse con tus clases comerciales (.btn-joyeria-enviar) --}}
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-joyeria-enviar px-5 py-2 text-uppercase tracking-wider rounded-0 fix-b">
                            R E G I S T R A R S E
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

{{-- Script JS para la carga dinámica de ciudades --}}
<script>
document.getElementById('provincia_id').addEventListener('change', function() {
    var provinciaId = this.value;
    var selectCiudad = document.getElementById('ciudad_id');
    
    selectCiudad.innerHTML = '<option value="">Seleccione una ciudad...</option>';
    selectCiudad.disabled = true;

    if(provinciaId) {
        fetch('/api/provincias/' + provinciaId + '/ciudades')
            .then(response => response.json())
            .then(data => {
                data.forEach(ciudad => {
                    var option = document.createElement('option');
                    option.value = ciudad.id;
                    option.textContent = ciudad.nombre_ciudad + ' (CP: ' + ciudad.codigo_postal + ')';
                    selectCiudad.appendChild(option);
                });
                selectCiudad.disabled = false;
            });
    }
});
</script>
@endsection