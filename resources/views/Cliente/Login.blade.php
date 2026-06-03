@extends('plantilla-principal')

@section('contenido')


<div class="container login-container">
    <div class="card shadow border-0">
        <div class="card-body p-5">
            <h2 class="text-center mb-4 fw-bold text-primary">Iniciar Sesión</h2>
            
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0 list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li><i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                    <input 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="nombre@ejemplo.com"
                        required 
                        autofocus
                    >
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Contraseña</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        name="password" 
                        placeholder="********"
                        required
                    >
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg fw-semibold shadow-sm">Ingresar</button>
                </div>
            </form>

            <hr class="my-4 text-muted">

            <div class="text-center">
                <p class="mb-0 text-muted">¿No tienes una cuenta? <a href="{{ url('/registro') }}" class="text-decoration-none fw-semibold">Regístrate aquí</a></p>
            </div>
        </div>
    </div>
</div>

@endsection