<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function procesar(Request $request)
    {
        // 1. Validar
        $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:20', // Nuevo campo de tu formulario
            'email' => 'required|email|max:100',
            'mensaje' => 'required|string|max:200',
        ]);

        // 2. Guardar
        Consulta::create([
            'usuario_id' => Auth::id(),
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'mensaje' => $request->mensaje,
        ]);

        // 3. Redirigir a la vista de éxito con los datos
        return view('exito', [
            'nombre' => $request->nombre,
            'email' => $request->email
        ]);
    }
}
