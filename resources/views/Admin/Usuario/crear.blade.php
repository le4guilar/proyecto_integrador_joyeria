@extends('Admin/Plantillas/plantilla-principal')

@section('contenido')

<div class="container mt-5" style="max-width: 750px;">
    <div class="card shadow border-0 mb-5">
        <div class="card-header bg-primary text-white py-3">
            <h4 class="mb-0 fw-bold">Registrar Usuario</h4>
        </div>
        <div class="card-body p-4">

            @if($errors->has('error'))
                <div class="alert alert-danger">{{ $errors->first('error') }}</div>
            @endif

            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label fw-semibold">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        @error('nombre') <div class="invalid-feedback">{{ 'Tas loc@? Máximo 255 caracteres' }}</div> @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label fw-semibold">Apellido</label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                        @error('apellido') <div class="invalid-feedback">{{ 'Tas loc@? Máximo 255 caracteres' }}</div> @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email') <div class="invalid-feedback">{{ 'Correo en uso' }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password') <div class="invalid-feedback">{{ 'Mínimo 4 caracteres' }}</div> @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="rol_id" class="form-label fw-semibold">Asignar Rol</label>
                        <select class="form-select @error('rol_id') is-invalid @enderror" id="rol_id" name="rol_id" required>
                            <option value="" selected disabled>Seleccione un rol...</option>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->id }}" {{ old('rol_id') == $rol->id ? 'selected' : '' }}>
                                    {{ ucfirst($rol->nombre_rol) }}
                                </option>
                            @endforeach
                        </select>
                        @error('rol_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <hr class="my-4 text-muted">
                <h5 class="fw-bold mb-3 text-secondary">Datos del Domicilio</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="provincia_id" class="form-label fw-semibold">Provincia</label>
                        <select class="form-select" id="provincia_id" name="provincia_id" required>
                            <option value="" selected disabled>Seleccione una provincia...</option>
                            @foreach($provincias as $provincia)
                                <option value="{{ $provincia->id }}">{{ $provincia->nombre_provincia }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="ciudad_id" class="form-label fw-semibold">Ciudad</label>
                        <select class="form-select @error('ciudad_id') is-invalid @enderror" id="ciudad_id" name="ciudad_id" required disabled>
                            <option value="" selected disabled>Seleccione primero una provincia...</option>
                        </select>
                        @error('ciudad_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="detalle_domicilio" class="form-label fw-semibold">Dirección (Calle, Número, Depto.)</label>
                    <input type="text" class="form-control @error('detalle_domicilio') is-invalid @enderror" id="detalle_domicilio" name="detalle_domicilio" value="{{ old('detalle_domicilio') }}" placeholder="Ej: Av. Italia 1420" required>
                    @error('detalle_domicilio') <div class="invalid-feedback">{{ 'Tas loc@? Máximo 255 caracteres'   }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-light border">Cancelar</a>
                    <button type="submit" class="btn btn-primary fw-semibold">Registrar Usuario</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
document.getElementById('provincia_id').addEventListener('change', function() {
    var provinciaId = this.value;
    var selectCiudad = document.getElementById('ciudad_id');
    
    // Limpiamos el selector de ciudades
    selectCiudad.innerHTML = '<option value="" selected disabled>Cargando ciudades...</option>';
    selectCiudad.disabled = true;

    // Hacemos la petición fetch a nuestra ruta de Laravel
    fetch('/obtener-ciudades/' + provinciaId)
        .then(response => response.json())
        .then(data => {
            selectCiudad.innerHTML = '<option value="" selected disabled>Seleccione una ciudad...</option>';
            
            // Recorremos las ciudades devueltas y las agregamos al select
            data.forEach(ciudad => {
                var option = document.createElement('option');
                option.value = ciudad.id;
                option.textContent = ciudad.nombre_ciudad; 
                selectCiudad.appendChild(option);
            });
            
            // Habilitamos el campo
            selectCiudad.disabled = false;
        })
        .catch(error => {
            console.error('Error al cargar las ciudades:', error);
            selectCiudad.innerHTML = '<option value="" selected disabled>Error al cargar</option>';
        });
});
</script>

@endsection