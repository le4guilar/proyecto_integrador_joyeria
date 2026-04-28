<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    
    
    public function procesar(Request $request)

    {

    $request->validate ([
        'nombre' => 'required|string',
        'telefono' => 'required|numeric',
        'email' => 'required|email',
        'mensaje' => 'required|min:5',
    ]);

    
        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        $mensaje = $request->input('mensaje');
        return view('exito', [
                    'nombre' => $nombre,
                    'email' => $email
        ]);
    }
}

?>