<?php

namespace App\Http\Controllers;

use App\Models\EstadoOrden;
use Illuminate\Http\Request;

class EstadoOrdenController extends Controller
{
    // Muestra el listado de estados (Para la vista de configuración del Admin)
     
    public function index()
    {
        $estados = EstadoOrden::all();
        return view('admin.estados.index', compact('estados'));
    }

    //Guarda un nuevo estado personalizado en la base de datos si fuera necesario
     
    public function store(Request $request)
    {
        $request->validate([
            'nombre_estado_orden' => 'required|string|max:255|unique:estado_orden,nombre_estado_orden',
        ]);

        EstadoOrden::create([
            'nombre_estado_orden' => $request->nombre_estado_orden
        ]);

        return redirect()->back()->with('status', 'Nuevo estado de orden creado con éxito.');
    }

    //Permite editar el nombre de un estado (Ej: De "En camino" a "Enviado")
     
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_estado_orden' => 'required|string|max:255|unique:estado_orden,nombre_estado_orden,' . $id,
        ]);

        $estado = EstadoOrden::findOrFail($id);
        $estado->update([
            'nombre_estado_orden' => $request->nombre_estado_orden
        ]);

        return redirect()->back()->with('status', 'Estado de orden actualizado correctamente.');
    }

    // Elimina un estado usando Soft Deletes (como definiste en tu Modelo)
     
    public function destroy($id)
    {
        $estado = EstadoOrden::findOrFail($id);
        
        // Validación de seguridad opcional: comprobar si hay órdenes usándolo antes de borrar
        if ($estado->ordenes()->exists()) {
            return redirect()->back()->withErrors(['error' => 'No se puede borrar este estado porque ya pertenece a órdenes existentes.']);
        }

        $estado->delete();

        return redirect()->back()->with('status', 'Estado de orden eliminado de forma lógica.');
    }
}