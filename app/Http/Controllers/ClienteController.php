<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Favoritos;

class ClienteController extends Controller
{
    //Muestra el panel principal del cliente
    public function dashboard(){

        //se consigue el ID del usuario que esta navegando en la web en ese momento
        $usuarioLogueadoId = Auth::id(); 

        //va a Dbeaver y busca solo las ordenes que el pertenezcan a ese cliente
        $misOrdenes = Orden::where('usuario_id', $usuarioLogueadoId)->get();

        //Buscamos los favoritos del cliente en DBeaver
        // Usamos 'with' para que de paso cargue toda la informacion de la joya (nombre, precio, imagen)
        $misFavoritos = Favoritos::where('usuario_id', $usuarioLogueadoId)->with('producto')->get();


        //Retornamos la vista 'Cliente.Cliente'
        //para mostrar los datos del cliente en el perfil, capturamos el objeto usuario completo con el Auth y se le agrega el compact.
        $usuario = Auth::user();

        //se abre la pantalla del cliente y le pasamos sus ordenes usando compact
        return view('Cliente.Dashboard', compact('misOrdenes' , 'usuario', 'misFavoritos'));
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
    public function updatePerfil(Request $request){
        
        //  conseguimos el ID real del usuario que esta navegando
        $usuarioId = Auth::id(); 

        // validamos los datos (usando el ID directo)
        $request->validate([
            'nombre' => ['required', 'string', 'max:200'],
            'email'  => ['required', 'string', 'email', 'max:200', 'unique:users,email,' . $usuarioId],
        ]);

        // IMPORTANTE: Buscamos al usuario en DBeaver de forma unica usando findOrFail
        // Esto asegura que ES un usuario, no una colección.
        $usuarioReal = User::findOrFail($usuarioId);

        // Le asignamos los datos nuevos
        $usuarioReal->nombre = $request->nombre;
        $usuarioReal->email  = $request->email;

        // Guardamos en DBeaver
        $usuarioReal->save();
        
        return back()->with('status', '¡Datos del perfil actualizados correctamente!');
    }

    public function agregarFavorito(Request $request)
    {
        $usuarioId = Auth::id();
        $productoId = $request->input('producto_id');

        // Buscamos directo en la tabla si ya existe este favorito para no duplicar
        $existe = DB::table('favoritos')
            ->where('usuario_id', $usuarioId)
            ->where('producto_id', $productoId)
            ->first();

        //  Si no existe en DBeaver, insertamos la nueva fila
        if (!$existe) {
            DB::table('favoritos')->insert([
                'usuario_id'  => $usuarioId,
                'producto_id' => $productoId,
                'created_at'  => now(),
                'updated_at'  => now()
            ]);
        }

        //vuelve al catalogo cuando se seleccion el corazon
        return back();
    }

    // FUNCION para quitar una joya de la lista de deseos
    public function eliminarFavorito($id)
    {
        $usuarioId = Auth::id();

        // Buscamos el registro en la tabla favoritos que coincida con el ID y con el usuario logueado por seguridad
        DB::table('favoritos')
            ->where('id', $id)
            ->where('usuario_id', $usuarioId)
            ->delete();

        // Volvemos al dashboard con un lindo mensaje de estado
        return back()->with('status', 'Producto eliminado de tu lista de deseos.');
    }
}
