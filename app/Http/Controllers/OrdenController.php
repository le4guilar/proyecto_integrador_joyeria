<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Carrito;
use App\Models\DetalleOrden;
use App\Models\Orden;
use App\Models\Producto;



class OrdenController extends Controller
{

public function index()
{
    $ordenes = Orden::with(['usuario', 'estado'])->orderBy('created_at', 'desc')->get();
    
    // Retorna la vista asegurando que el navegador no la almacene en caché
    return response()
        ->view('Admin.ordenes.index', compact('ordenes'))
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
            return back()->withErrors(['error' => 'Hubo un error al procesar tu compra: ' . $e->getMessage()]);
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
