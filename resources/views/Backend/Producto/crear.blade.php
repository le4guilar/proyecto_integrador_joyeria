@extends('plantilla-principal')

@section('contenido')

<div class="container mt-5 mb-5" style="max-width: 750px;">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white py-3">
            <h4 class="mb-0 fw-bold"><i class="bi bi-gem me-2"></i>Cargar Nueva Joya al Inventario</h4>
        </div>
        <div class="card-body p-4">

            {{-- Formulario apuntando a store con el enctype obligatorio para archivos --}}
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nombre_joya" class="form-label fw-semibold">Nombre de la Joya</label>
                    <input type="text" class="form-control @error('nombre_joya') is-invalid @enderror" id="nombre_joya" name="nombre_joya" value="{{ old('nombre_joya') }}" required>
                    @error('nombre_joya') <div class="invalid-feedback">{{ 'Máximo 50 caracteres' }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-semibold">Descripción / Detalles técnicos</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
                    @error('descripcion') <div class="invalid-feedback">{{ 'Máximo 200 caracteres' }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="categoria_joya_id" class="form-label fw-semibold">Categoría</label>
                        <select class="form-select @error('categoria_joya_id') is-invalid @enderror" id="categoria_joya_id" name="categoria_joya_id" required>
                            <option value="" selected disabled>Seleccione una...</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_joya_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre_categoria }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria_joya_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="genero_joya_id" class="form-label fw-semibold">Género asignado</label>
                        <select class="form-select @error('genero_joya_id') is-invalid @enderror" id="genero_joya_id" name="genero_joya_id" required>
                            <option value="" selected disabled>Seleccione uno...</option>
                            @foreach($genero as $g)
                                <option value="{{ $g->id }}" {{ old('genero_joya_id') == $g->id ? 'selected' : '' }}>
                                    {{ $g->nombre_genero }}
                                </option>
                            @endforeach
                        </select>
                        @error('genero_joya_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="precio_unitario" class="form-label fw-semibold">Precio Unitario</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control @error('precio_unitario') is-invalid @enderror" id="precio_unitario" name="precio_unitario" value="{{ old('precio_unitario') }}" placeholder="0.00" required>
                        </div>
                        @error('precio_unitario') <div class="text-danger small mt-1">{{ 'Valor mínimo 0' }}</div> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="stock" class="form-label fw-semibold">Stock Inicial</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}" placeholder="0" required>
                        @error('stock') <div class="invalid-feedback">{{ 'Valor mínimo 0' }}</div> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="stock_bajo" class="form-label fw-semibold">Stock Mínimo (Alerta)</label>
                        <input type="number" class="form-control @error('stock_bajo') is-invalid @enderror" id="stock_bajo" name="stock_bajo" value="{{ old('stock_bajo', 5) }}" placeholder="5" required>
                        @error('stock_bajo') <div class="invalid-feedback">{{ 'Valor mínimo 0' }}</div> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Imagen de la Joya</label>
                    
                    <div id="drop-zone" class="border border-2 border-dashed rounded-3 p-4 text-center bg-white position-relative" style="cursor: pointer; border-color: #6c757d !important;">
                        <i class="bi bi-cloud-arrow-up-fill text-secondary fs-1"></i>
                        <p class="mt-2 mb-1 fw-medium text-dark" id="drop-text">Arrastra tu imagen aquí o haz clic para buscar</p>
                        <p class="text-muted small mb-0">Formatos permitidos: JPG, PNG, WEBP (Máx. 20MB)</p>
                        
                        <input type="file" id="url_imagen" name="url_imagen" class="position-absolute top-0 start-0 w-100 h-100 opacity-0" accept="image/*" style="cursor: pointer;">
                    </div>
                    
                    <div id="preview-container" class="mt-3 d-none text-center">
                        <p class="small text-success fw-semibold mb-2">Vista previa de la joya:</p>
                        <img id="image-preview" src="#" alt="Previsualización" class="img-thumbnail shadow-sm" style="max-height: 150px;">
                    </div>
                    @error('url_imagen') <div class="text-danger small mt-1">{{ 'Debe ser menor a 20MB' }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary fw-semibold">Cancelar</a>
                    <button type="submit" class="btn btn-primary fw-semibold px-4">Guardar Producto</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
const dropZone = document.getElementById('drop-zone');
const fileInput = document.getElementById('url_imagen');
const dropText = document.getElementById('drop-text');
const previewContainer = document.getElementById('preview-container');
const imagePreview = document.getElementById('image-preview');

// primero evitamos q el navegador abra la imagen por defecto
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    document.body.addEventListener(eventName, (e) => e.preventDefault(), false);
});

// un efecto cuando baila el archivo por la zona drop
['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, (e) => {
        e.preventDefault();
        dropZone.classList.add('bg-light');
        dropZone.style.borderColor = '#0d6efd';
    }, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, (e) => {
        e.preventDefault();
        dropZone.classList.remove('bg-light');
        dropZone.style.borderColor = '#6c757d'; // Vuelve a gris
    }, false);
});

// capturamos el archivo q se tira
dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    
    const dt = e.dataTransfer;
    const files = dt.files;

    if (files && files[0]) {
        // Le asignamos físicamente el archivo arrastrado al input oculto
        fileInput.files = files; 
        
        // Ejecutamos la previsualización
        mostrarPrevisualizacion(fileInput);
    }
}, false);

// capturamos el archivo si prefiere hacer clic
fileInput.addEventListener('change', function() {
    mostrarPrevisualizacion(this);
});

// procesa la imagen y muestra miniatura
function mostrarPrevisualizacion(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        
        if (!file.type.startsWith('image/')) {
            alert('Por favor, selecciona solo archivos de imagen.');
            input.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            previewContainer.classList.remove('d-none');
            dropText.innerHTML = `<span class="text-success fw-bold">¡Imagen lista!:</span> ${file.name}`;
        }
        reader.readAsDataURL(file);
    }
}
</script>

@endsection