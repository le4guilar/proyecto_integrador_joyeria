<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    //Muestra el panel principal del cliente
    public function dashboard(){

        //1. se consigue el ID del usuario que esta navegando en la web en ese momento
        $usuarioLogueadoId = Auth::id(); 

        //2. va a Dbeaver y busca solo las ordenes que el pertenezcan a ese cliente
        $misOrdenes = Orden::where('usuario_id', $usuarioLogueadoId)->get();

        //3. Retornamos la vista 'Cliente.Cliente'
        //para mostrar los datos del cliente en el perfil, capturamos el objeto usuario completo con el Auth y se le agrega el compact.
        $usuario = Auth::user();

        //se abre la pantalla del cliente y le pasamos sus ordenes usando compact
        return view('Cliente.Dashboard', compact('misOrdenes' , 'usuario'));
    }

    //NUEVA FUNCION: para que el cliente modifique la contraseña
    public function updatePassword(Request $request){

        //validamos que lo que escribe este bien
        $request->validate([
            'current_password' => ['required', 'current_password'], //verifica que la contraseña actual sea la correcta
            'password' => ['required', 'confirmed', 'min:4'], //nueva contraseña de minimo 8 caracteres.
        ]);

        //actualizamos la contraseña en la base de datos
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', '¡Contraseña actualizada correctamente!');
    }
}
