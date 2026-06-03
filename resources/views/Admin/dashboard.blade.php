@extends('Admin/Plantillas/plantilla-principal')

@section('title', 'Inicio')

@section('content')
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h6 class="card-title">Ventas del Día</h6>
                <h3 class="card-text">$4,500</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h6 class="card-title">Nuevos Pedidos</h6>
                <h3 class="card-text">24</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h6 class="card-title">Usuarios Registrados</h6>
                <h3 class="card-text">1,250</h3>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header bg-white">
        Últimos Pedidos
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Monto</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#1024</td>
                    <td>Juan Pérez</td>
                    <td>$150.00</td>
                    <td><span class="badge bg-success">Completado</span></td>
                </tr>
                <tr>
                    <td>#1025</td>
                    <td>María López</td>
                    <td>$85.50</td>
                    <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection