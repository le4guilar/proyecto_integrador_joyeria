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
            'password' => ['required', 'confirmed', 'min:4'], //nueva contraseña de minimo 4 caracteres.
        ]);

        //actualizamos la contraseña en la base de datos
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', '¡Contraseña actualizada correctamente!');
    }

    //FUNCION para que el cliente actulice su nombre e email 
    // FUNCION para que el cliente actualice su nombre e email 
    public function updatePerfil(Request $request){
        
        //  conseguimos el ID real del usuario que esta navegando
        $usuarioId = Auth::id(); 

        // validamos los datos (usando el ID directo)
        $request->validate([
            'nombre' => ['required', 'string', 'max:200'],
            'email'  => ['required', 'string', 'email', 'max:200', 'unique:users,email,' . $usuarioId],
        ]);

        // LA CLAVE: Buscamos al usuario en DBeaver de forma unica usando findOrFail
        // Esto asegura que ES un usuario, no una colección.
        $usuarioReal = \App\Models\User::findOrFail($usuarioId);

        // Le asignamos los datos nuevos
        $usuarioReal->nombre = $request->nombre;
        $usuarioReal->email  = $request->email;

        // Guardamos en DBeaver
        $usuarioReal->save();
        
        return back()->with('status', '¡Datos del perfil actualizados correctamente!');
    }
}
