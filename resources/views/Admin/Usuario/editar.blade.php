@extends('plantilla-principal')

@section('contenido')

<div class="container mt-5" style="max-width: 750px;">
    <div class="card shadow border-0 mb-5">
        <div class="card-header bg-warning text-dark py-3">
            <h4 class="mb-0 fw-bold">Modificar Usuario</h4>
        </div>
        <div class="card-body p-4">

            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label fw-semibold">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label fw-semibold">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', $usuario->apellido) }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $usuario->email) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label fw-semibold">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Dejar en blanco para no cambiar">
                        <small class="text-muted d-block mt-1">Si no deseas cambiar la clave del usuario, deja este campo vacío.</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="rol_id" class="form-label fw-semibold">Cambiar Rol</label>
                        <select class="form-select" id="rol_id" name="rol_id" required>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->id }}" {{ old('rol_id', $usuario->rol_id) == $rol->id ? 'selected' : '' }}>
                                    {{ ucfirst($rol->nombre_rol) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr class="my-4 text-muted">
                <h5 class="fw-bold mb-3 text-secondary">Actualizar Domicilio</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="provincia_id" class="form-label fw-semibold">Provincia</label>
                        <select class="form-select" id="provincia_id" name="provincia_id" required>
                            <option value="" disabled>Seleccione una provincia...</option>
                            @php
                                $provinciaActualId = $usuario->domicilio->ciudad_id ? DB::table('ciudad')->where('id', $usuario->domicilio->ciudad_id)->value('provincia_id') : null;
                            @endphp
                            @foreach($provincias as $provincia)
                                <option value="{{ $provincia->id }}" {{ $provinciaActualId == $provincia->id ? 'selected' : '' }}>
                                    {{ $provincia->nombre_provincia }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="ciudad_id" class="form-label fw-semibold">Ciudad</label>
                        <select class="form-select" id="ciudad_id" name="ciudad_id" required>
                            @foreach($ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}" {{ old('ciudad_id', $usuario->domicilio->ciudad_id) == $ciudad->id ? 'selected' : '' }}>
                                    {{ $ciudad->nombre_ciudad }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="detalle_domicilio" class="form-label fw-semibold">Dirección</label>
                    <input type="text" class="form-control" id="detalle_domicilio" name="detalle_domicilio" value="{{ old('detalle_domicilio', $usuario->domicilio->detalle_domicilio) }}" required>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-light border">Cancelar</a>
                    <button type="submit" class="btn btn-warning text-dark fw-semibold">Guardar Cambios</button>
                </div>
            </form>

        </div>
    </div>
</div>

{{--Este pedacito de código es para q busque las ciudades asociadas a esa provincia--}}
<script>
document.getElementById('provincia_id').addEventListener('change', function() {
    var provinciaId = this.value;
    var selectCiudad = document.getElementById('ciudad_id');
    
    selectCiudad.innerHTML = '<option value="" selected disabled>Cargando ciudades...</option>';

    fetch('/obtener-ciudades/' + provinciaId)
        .then(response => response.json())
        .then(data => {
            selectCiudad.innerHTML = '<option value="" selected disabled>Seleccione una ciudad...</option>';
            data.forEach(ciudad => {
                var option = document.createElement('option');
                option.value = ciudad.id;
                option.textContent = ciudad.nombre_ciudad;
                selectCiudad.appendChild(option);
            });
        });
});
</script>

@endsection