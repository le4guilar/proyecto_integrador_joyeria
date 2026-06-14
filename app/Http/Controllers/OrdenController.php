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
    public function checkout(Request $request)
    {
        $userId = $request->user()->usuario_id;
        //$userId = auth()->id(); // O el ID que obtengas del request si es una API
        //$userId = auth()->user()->id(); 

        // 1. Obtener los productos del carrito de este usuario
        $carritoItems = Carrito::where('usuario_id', $userId)->get();

        if ($carritoItems->isEmpty()) {
            return response()->json(['message' => 'El carrito está vacío'], 400);
        }

        try {
            // Iniciamos la transacción atómica
            DB::transaction(function () use ($userId, $carritoItems) {

                // 2. Calcular el total del carrito
                $total = $carritoItems->sum(function ($item) {
                    return $item->cantidad * $item->precio_unitario;
                });

                // ID del estado inicial (ej: 1 = Pendiente). Ajustalo según tu tabla 'estado_orden'
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
}
