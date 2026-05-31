<?php

namespace App\Http\Controllers;
use App\Models\Contacto;
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

    Contacto::create([
            'nombre'   => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
            'email'    => $request->input('email'),
            'mensaje'  => $request->input('mensaje'),
            'asunto'   => $request->input('asunto'), 
            'estado'   => 1 
        ]);

        return view('exito', [
                    'nombre' => $request->input('nombre'),
                    'email' => $request->input('email'),
        ]);
    }
}

?>