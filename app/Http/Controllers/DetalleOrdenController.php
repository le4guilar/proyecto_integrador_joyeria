<?php

namespace App\Http\Controllers;

use App\Models\DetalleOrden;
use App\Models\Orden;
use Illuminate\Http\Request;
use App\Models\EstadoOrden;

class DetalleOrdenController extends Controller
{
    public function show($orden_id)
    {
        $orden = Orden::findOrFail($orden_id);
        $detalles = DetalleOrden::where('orden_id', $orden_id)->with('producto')->get();

        // Buscamos todos los estados disponibles para el desplegable
        $estados = EstadoOrden::all();

        return view('admin.ordenes.detalles', compact('orden', 'detalles', 'estados'));
    }
}
