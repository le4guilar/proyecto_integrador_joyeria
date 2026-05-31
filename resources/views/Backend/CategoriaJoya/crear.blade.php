@extends('plantilla-principal')

@section('contenido')
<div class="container mt-5 mb-5" style="max-width: 600px;">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white py-3">
            <h4 class="mb-0 fw-bold">Agregar una nueva Categoría</h4>
        </div>
        <div class="card-body p-4">

            <form action="{{ route('categoria-joyas.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre_categoria" class="form-label fw-semibold">Nombre de la Categoría</label>
                    <input 
                        type="text" 
                        class="form-control @error('nombre_categoria') is-invalid @enderror" 
                        id="nombre_categoria" 
                        name="nombre_categoria" 
                        value="{{ old('nombre_categoria') }}" 
                        required
                    >
                    @error('nombre_categoria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('categoria-joyas.index') }}" class="btn btn-light border">Cancelar</a>
                    <button type="submit" class="btn btn-primary fw-semibold">Guardar Categoria</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection