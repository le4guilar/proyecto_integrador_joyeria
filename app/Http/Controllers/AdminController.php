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
        $pedidosBase = Orden::with(['usuario', 'estado'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

            //recorremos los pedidos y le asignamos la clase css segun su estado
            $ultimosPedidos = $pedidosBase->map(function ($pedido){
                $estadoStr = strtolower(trim($pedido->estado->nombre_estado_orden ?? ''));
                
                //aca se mando el match, pero con el cambio de que se devuelve el nombre de la clase CSS
                $pedido->clase_badge = match($estadoStr){
                    'pagado', 'aprobado' => 'badge-pagado',
                    'preparando' => 'badge-pendiente',
                    'en camino', 'despachado' => 'badge-camino',
                    'entregado', 'finalizado' => 'badge-entregado',
                    'cancelado', 'rechazado' => 'badge-cancelado',
                    default => 'badge-pendiente'                
                    };
                    return $pedido;
            });

        // 6. Top 5 productos más vendidos (Agrupando por cantidad en detalle_orden)
        $topProductos = DetalleOrden::select('producto_id', DB::raw('SUM(cantidad) as total_vendido'))
            ->groupBy('producto_id')
            ->orderByDesc('total_vendido')
            ->take(5)
            ->with('producto') // Trae la info de la joya
            ->get();

        $ventasPorCategoria = DetalleOrden::join('producto', 'detalle_orden.producto_id', '=', 'producto.id')
            ->select('producto.categoria_joya_id', DB::raw('SUM(detalle_orden.cantidad) as total'))
            ->groupBy('producto.categoria_joya_id')
            ->get()
            ->map(function ($item) {
                // Mapeo basado en tu seeder
                $nombres = [1 => 'Anillos', 2 => 'Aretes', 3 => 'Pulseras', 4 => 'Collares'];
                return [
                    'nombre' => $nombres[$item->categoria_joya_id] ?? 'Otros',
                    'total' => $item->total
                ];
            });

        $nombresCategorias = json_encode($ventasPorCategoria->pluck('nombre'));
        $totalesCategorias = json_encode($ventasPorCategoria->pluck('total'));

        // Enviamos todo a la vista
        return view('Admin.dashboard', compact(
            'pedidosPendientes',
            'ticketMedio',
            'usuariosRegistrados',
            'pedidosEntregados',
            'ultimosPedidos',
            'topProductos',
            'nombresCategorias',
            'totalesCategorias'
        ));
    }
}
