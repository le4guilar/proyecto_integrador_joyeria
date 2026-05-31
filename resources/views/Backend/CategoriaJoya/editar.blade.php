@extends('plantilla-principal')

@section('contenido')

<div class="container mt-5 mb-5" style="max-width: 600px;">
    <div class="card shadow border-0">
        <div class="card-header bg-warning text-white py-3">
            <h4 class="mb-0 fw-bold">Editar Categoría</h4>
        </div>
        <div class="card-body p-4">

            <form action="{{ route('categoria-joyas.update', $categoria->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="mb-4">
                    <label for="nombre_categoria" class="form-label fw-semibold">Nombre de la Categoría</label>
                    <input 
                        type="text" 
                        class="form-control @error('nombre_categoria') is-invalid @enderror" 
                        id="nombre_categoria" 
                        name="nombre_categoria" 
                        value="{{ old('nombre', $categoria->nombre_categoria) }}" required
                    >
                    @error('nombre_categoria')
                        <div class="invalid-feedback">{{ 'El nombre de la categoria no debe ser mayor a 15 caracteres' }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('categoria-joyas.index') }}" class="btn btn-light border">Cancelar</a>
                    <button type="submit" class="btn btn-warning text-white fw-semibold">Guardar Cambios</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection