<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    //1. VER EL CARRITO (se filtra al usuario por ID)
    public function index(){

        //BUSCAR EL WITHTRASHED
        //se trae todos los datos que esten cargados en la tabla del carrito junto con los datos de su Producto.
        $items = Carrito::with('producto')->get();

        //se calcula el total de la pantalla multiplicando precio por cantidad de cada fila
        $total = $items->sum(function($item){
            return $item->precio_unitario * $item->cantidad;
        });

        //retorna la vista del catalogo donde se ve el carrito
        return view('Cliente.Carrito.index', compact('items' , 'total'));
    }

    //2. AGREGAR UN PRODUCTO AL CARRITO 
    public function store(Request $request){

        //se valida que se mande un id de porducto valido y una cantidad logica
        $request->validate([
            'producto_id' => 'required|integer',
            'cantidad' => 'required|integer|min:1'
        ]);

        //se busca la joya en la tabla para ver los datos reales del inventario
        $producto = Producto::findOrFail($request->producto_id);
        $cantidad_solicitada = $request->cantidad;

        //CONTROL DE STOCK: se verifica si hahy suficientes joyas fisicas en el negocio
        if ($producto->stock < $cantidad_solicitada){

            //si el cliente pide mas de lo que hay, lo rebotamos al toque con un mensaje
            return redirect()->back()->with('error', "No hay suficiente stock. Solo quedan {$producto->stock} unidades de este producto");
        }

        //se busca si ese mismo producto ya estaba metido en la tabla carrito
        $itemExistente = Carrito::where('producto_id', $producto->id)->first();

        if ($itemExistente){

            //si existia en el carrito, controlamos que al sumarle mas no superemos el stock total
            if(($itemExistente->cantidad + $cantidad_solicitada) > $producto->stock){
                return redirect()->back()->with('error', "No podes agregar más unidades. El stock máximo disponible es de {$producto->stock} u.");
            }

            //si pasa la prueba, le sumamos las unidades al registro viejo
            $itemExistente->increment('cantidad', $cantidad_solicitada);
        } else {

        //si es una joya nueva en el carrito, creamos la fila en la tabla desde cero
        Carrito::create([
            'producto_id' => $producto->id,
            'cantidad' => $cantidad_solicitada,
            'precio_unitario' => $producto->precio_unitario, //se guarda el precio de lista de ese instante
            'usuario_id' => Auth::id() ?? 1, //PROVISORIO: Usa el usuario logueado o el ID 1 por defecto si no hay login activo
        ]);
        }
        return redirect()->route('carrito.index')->with('status', '¡Producto añadido al carrito con exito!');
    }

    //3. QUITAR UN PRODUCTO DEL CARRITO 
    public function destroy($id){
        //para el item del carrito en si, como es algo temporal, usamos delete().
        $item = Carrito::findOrFail($id);
        $item->delete();

        return redirect()->route('carrito.index')->with('status', 'Producto quitado del carrito');
    }
}
