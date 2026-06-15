<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Carrito;
use App\Models\DetalleOrden;
use App\Models\Orden;
use App\Models\Producto;
use App\Models\EstadoOrden;



class OrdenController extends Controller
{

    public function index(Request $request)
    {
        // Sumamos 'detalles.producto' para poder ver las joyas en el desplegable sin consultar la BD por cada fila
        $query = Orden::with(['usuario', 'estado', 'detalles.producto']);

        // Filtro para buscar por número de orden (ID)
        if ($request->filled('buscar_id')) {
            // Limpiamos por si el usuario escribe "#15" en vez de "15"
            $idBuscado = str_replace('#', '', $request->buscar_id);
            $query->where('id', (int)$idBuscado);
        }

        // Filtro por estado del pedido
        if ($request->filled('estado_id')) {
            $query->where('estado_orden_id', $request->estado_id);
        }

        $ordenes = $query->orderBy('created_at', 'desc')->get();

        // Traemos los estados para armar el <select> en la vista
        $estados = EstadoOrden::all();

        return response()
            ->view('Admin.ordenes.index', compact('ordenes', 'estados'))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }


    public function checkout(Request $request)
    {
        $userId = $request->user()->id;

        // 1. Obtener los productos del carrito de este usuario
        $carritoItems = Carrito::where('usuario_id', $userId)->get();

        if ($carritoItems->isEmpty()) {
            // En vez del JSON, lo devolvemos a la página anterior con un mensaje:
            return back()->withErrors(['error' => 'Tu carrito está vacío. Agregá joyas antes de finalizar la compra.']);
        }

        try {
            // Iniciamos la transacción atómica
            DB::transaction(function () use ($userId, $carritoItems) {

                //PASO DE SEGURIDAD: validamos el stock de todo el carrito antes de tocar nada
                foreach ($carritoItems as $item) {
                    $producto = Producto::find($item->producto_id);

                    //si el porducto no existe o la cantidad que se quiere supera el stock real en DBeaver
                    if (!$producto || $item->cantidad > $producto->stock) {

                        //lanzamos una excepcion para frenar la compra si no hay mas stock del porducto
                        throw new \Exception("Lo sentimos, el producto '{$producto->nombre_joya}' ya no tiene suficiente stock disponible (Quedan: {$producto->stock}).");
                    }
                }

                // 2. Calcular el total del carrito
                $total = $carritoItems->sum(function ($item) {
                    return $item->cantidad * $item->precio_unitario;
                });

                // ID del estado inicial (ej: 1 = Pagado). Ajustalo según tu tabla 'estado_orden'
                $estadoInicialId = 1;

                // 3. Crear la Orden
                $orden = Orden::create([
                    'total' => $total,
                    'usuario_id' => $userId,
                    'estado_orden_id' => $estadoInicialId,
                ]);

                // 4. Migrar ítems a detalle_orden y actualizar stock
                foreach ($carritoItems as $item) {
                    // Crear detalle
                    DetalleOrden::create([
                        'orden_id' => $orden->id,
                        'producto_id' => $item->producto_id,
                        'cantidad' => $item->cantidad,
                        'precio_unitario' => $item->precio_unitario,
                        'subtotal' => $item->cantidad * $item->precio_unitario,
                    ]);

                    // Descontar stock del producto
                    $producto = Producto::find($item->producto_id);
                    if ($producto) {
                        $producto->decrement('stock', $item->cantidad);
                    }
                }

                // 5. Vaciar el carrito del usuario (Usando soft delete o delete común según tu estructura)
                Carrito::where('usuario_id', $userId)->delete();
            });

            return redirect()->route('carrito.gracias');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updateEstado(Request $request, $id)
    {
        $request->validate([
            'estado_orden_id' => 'required|exists:estado_orden,id'
        ]);

        $orden = Orden::findOrFail($id);
        $orden->update([
            'estado_orden_id' => $request->estado_orden_id
        ]);

        return redirect()->back()->with('status', 'Estado del pedido actualizado correctamente.');
    }
}
