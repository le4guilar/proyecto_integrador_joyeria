@extends('plantilla-principal')

@section('contenido')

<div class="container mt-5 mb-5" style="max-width: 750px;">
    <div class="card shadow border-0">
        <div class="card-header bg-warning text-white py-3">
            <h4 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Editar Joya: {{ $producto->nombre_joya }}</h4>
        </div>
        <div class="card-body p-4">

            {{-- Formulario apuntando a productos.update pasándole el ID de la joya --}}
            <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- 👈 Directiva obligatoria para actualizar en Laravel --}}

                <div class="mb-3">
                    <label for="nombre_joya" class="form-label fw-semibold">Nombre de la Joya</label>
                    <input type="text" class="form-control @error('nombre_joya') is-invalid @enderror" id="nombre_joya" name="nombre_joya" value="{{ old('nombre_joya', $producto->nombre_joya) }}" required>
                    @error('nombre_joya') <div class="invalid-feedback">Máximo 50 caracteres</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-semibold">Descripción / Detalles técnicos</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                    @error('descripcion') <div class="invalid-feedback">Máximo 200 caracteres</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="categoria_joya_id" class="form-label fw-semibold">Categoría</label>
                        <select class="form-select @error('categoria_joya_id') is-invalid @enderror" id="categoria_joya_id" name="categoria_joya_id" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_joya_id', $producto->categoria_joya_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre_categoria }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="genero_joya_id" class="form-label fw-semibold">Género asignado</label>
                        <select class="form-select @error('genero_joya_id') is-invalid @enderror" id="genero_joya_id" name="genero_joya_id" required>
                            @foreach($genero as $g)
                                <option value="{{ $g->id }}" {{ old('genero_joya_id', $producto->genero_joya_id) == $g->id ? 'selected' : '' }}>
                                    {{ $g->nombre_genero }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="precio_unitario" class="form-label fw-semibold">Precio Unitario</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control @error('precio_unitario') is-invalid @enderror" id="precio_unitario" name="precio_unitario" value="{{ old('precio_unitario', $producto->precio_unitario) }}" required>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="stock" class="form-label fw-semibold">Stock Actual</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="stock_bajo" class="form-label fw-semibold">Stock Mínimo (Alerta)</label>
                        <input type="number" class="form-control @error('stock_bajo') is-invalid @enderror" id="stock_bajo" name="stock_bajo" value="{{ old('stock_bajo', $producto->stock_bajo) }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Imagen de la Joya</label>
                    <div id="drop-zone" class="border border-2 border-dashed rounded-3 p-4 text-center bg-white position-relative" style="cursor: pointer; border-color: #6c757d !important;">
                        <i class="bi bi-cloud-arrow-up-fill text-secondary fs-1"></i>
                        <p class="mt-2 mb-1 fw-medium text-dark" id="drop-text">Arrastra una nueva imagen para cambiarla o haz clic</p>
                        <input type="file" id="url_imagen" name="url_imagen" class="position-absolute top-0 start-0 w-100 h-100 opacity-0" accept="image/*" style="cursor: pointer;">
                    </div>
                    
                    {{-- Mostramos la imagen actual que ya tiene la base de datos --}}
                    <div id="preview-container" class="mt-3 text-center">
                        <p class="small text-muted fw-semibold mb-2">Imagen actual / Vista previa:</p>
                        <img id="image-preview" src="{{ $producto->url_imagen ? asset($producto->url_imagen) : '#' }}" alt="Previsualización" class="img-thumbnail shadow-sm" style="max-height: 150px;">
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary fw-semibold">Cancelar</a>
                    <button type="submit" class="btn btn-warning fw-semibold text-white px-4">Actualizar Cambios</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
// Mantenemos el script genial de Leandro para que pueda arrastrar fotos nuevas al editar
const dropZone = document.getElementById('drop-zone');
const fileInput = document.getElementById('url_imagen');
const dropText = document.getElementById('drop-text');
const previewContainer = document.getElementById('preview-container');
const imagePreview = document.getElementById('image-preview');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    document.body.addEventListener(eventName, (e) => e.preventDefault(), false);
});

['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, (e) => {
        e.preventDefault();
        dropZone.classList.add('bg-light');
    }, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, (e) => {
        e.preventDefault();
        dropZone.classList.remove('bg-light');
    }, false);
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    const dt = e.dataTransfer;
    const files = dt.files;
    if (files && files[0]) {
        fileInput.files = files; 
        mostrarPrevisualizacion(fileInput);
    }
}, false);

fileInput.addEventListener('change', function() {
    mostrarPrevisualizacion(this);
});

function mostrarPrevisualizacion(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            dropText.innerHTML = `<span class="text-warning fw-bold">Nueva imagen lista:</span> ${file.name}`;
        }
        reader.readAsDataURL(file);
    }
}
</script>

@endsection