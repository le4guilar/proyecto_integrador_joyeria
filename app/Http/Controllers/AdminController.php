<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use App\Models\User;
use App\Models\DetalleOrden;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        // 1. Pedidos pendientes (Ejemplo: excluimos los entregados y cancelados)
        // Ajustá los nombres 'Entregado' y 'Cancelado' según como estén en tu tabla estado_orden
        $pedidosPendientes = Orden::whereHas('estado', function ($query) {
            $query->where('nombre_estado_orden', '!=', 'Entregado')
                ->where('nombre_estado_orden', '!=', 'Cancelado');
        })->count();

        // 2. Ticket medio (Promedio del total de todas las órdenes)
        $ticketMedio = Orden::avg('total') ?? 0;

        // 3. Usuarios registrados (Total de clientes)
        $usuariosRegistrados = User::count();

        // 4. Pedidos entregados
        $pedidosEntregados = Orden::whereHas('estado', function ($query) {
            $query->where('nombre_estado_orden', 'Entregado');
        })->count();

        // 5. Últimos 5 pedidos para la tabla
        $ultimosPedidos = Orden::with(['usuario', 'estado'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // 6. Top 5 productos más vendidos (Agrupando por cantidad en detalle_orden)
        $topProductos = DetalleOrden::select('producto_id', DB::raw('SUM(cantidad) as total_vendido'))
            ->groupBy('producto_id')
            ->orderByDesc('total_vendido')
            ->take(5)
            ->with('producto') // Trae la info de la joya
            ->get();

        // Enviamos todo a la vista
        return view('Admin.dashboard', compact(
            'pedidosPendientes',
            'ticketMedio',
            'usuariosRegistrados',
            'pedidosEntregados',
            'ultimosPedidos',
            'topProductos'
        ));
    }
}
