@extends('plantilla-principal')

@section('contenido')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Crear Cuenta</h4>
                </div>
                <div class="card-body p-4">

                    <form action="/registro" method="POST">
                        @csrf 

                        {{-- Campo Nombre --}}
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}" required>
                            @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Campo Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Selector de Provincia --}}
                        <div class="mb-3">
                            <label for="provincia_id" class="form-label">Provincia</label>
                            <select id="provincia_id" class="form-select" required>
                                <option value="">Seleccione una provincia...</option>
                                @foreach($provincias as $provincia)
                                    <option value="{{ $provincia->id }}">{{ $provincia->nombre_provincia }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Selector de Ciudad (Se carga dinámicamente) --}}
                        <div class="mb-3">
                            <label for="ciudad_id" class="form-label">Ciudad / Capital</label>
                            <select name="ciudad_id" id="ciudad_id" class="form-select @error('ciudad_id') is-invalid @enderror" required disabled>
                                <option value="">Seleccione primero una provincia...</option>
                            </select>
                            @error('ciudad_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Campo Detalle Domicilio --}}
                        <div class="mb-3">
                            <label for="detalle_domicilio" class="form-label">Dirección (Calle, Número, Piso)</label>
                            <input type="text" name="detalle_domicilio" id="detalle_domicilio" class="form-control @error('detalle_domicilio') is-invalid @enderror" value="{{ old('detalle_domicilio') }}" placeholder="Ej: Av. Siempreviva 742" required>
                            @error('detalle_domicilio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Campo Contraseña --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Campo Confirmar Contraseña --}}
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script JS para la carga dinámica de ciudades --}}
<script>
document.getElementById('provincia_id').addEventListener('change', function() {
    var provinciaId = this.value;
    var selectCiudad = document.getElementById('ciudad_id');
    
    // Limpiar select de ciudades
    selectCiudad.innerHTML = '<option value="">Seleccione una ciudad...</option>';
    selectCiudad.disabled = true;

    if(provinciaId) {
        // Petición asíncrona a la ruta de la API que creamos
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