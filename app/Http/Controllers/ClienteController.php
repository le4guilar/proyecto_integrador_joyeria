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

        //Retornamos la vista 'Cliente.Cliente'
        //para mostrar los datos del cliente en el perfil, capturamos el objeto usuario completo con el Auth y se le agrega el compact.
        $usuario = Auth::user();
        $usuarioLogueadoId = Auth::id(); 

        //va a Dbeaver y busca solo las ordenes que el pertenezcan a ese cliente
        $ordenesBase = Orden::where('usuario_id', Auth::id())
                    ->with(['estado', 'detalles.producto']) 
                    ->orderBy('created_at', 'desc')
                    ->get();

        //Se porcesa la logica de los estados despues de la compra: 
        //MAVELE NOMAS QUE FUNCIONE O DEJO LA CARRERA
        $misOrdenes = $ordenesBase->map(function($orden){
            //se extra el nombre del estado de forma segura
            $nombreEstado = 'Pagado';
            if(isset($orden->estado) && is_object($orden->estado)){
                $nombreEstado = $orden->estado->nombre_estado_orden;
            } elseif (isset($orden->estado) && is_array($orden->estado)){
                $nombreEstado = $orden->estado['nombre_estado_orden'];
            }elseif (isset($orden->estado)){
                $nombreEstado = $orden->estado;
            }

            $estadoLimpio = mb_strtolower(trim($nombreEstado));

            //SE LE ASIGNA LOS COLORES PORQUE EL AMIGO LEANDRO QUIERE QUE CAMBIEN DE COLOR
            if ($estadoLimpio == 'pagado' || $estadoLimpio == 'aprobado') {
                $orden->bg_color = '#286b38'; $orden->text_color = '#ffffff';
            } elseif ($estadoLimpio == 'en camino' || $estadoLimpio == 'despachado') {
                $orden->bg_color = '#300403'; $orden->text_color = '#dfdada';
            } elseif ($estadoLimpio == 'entregado' || $estadoLimpio == 'finalizado') {
                $orden->bg_color = '#6c757d'; $orden->text_color = '#ffffff';
            } elseif ($estadoLimpio == 'cancelado' || $estadoLimpio == 'rechazado') {
                $orden->bg_color = '#871b26'; $orden->text_color = '#ffffff';
            } else {
                $orden->bg_color = '#a78829'; $orden->text_color = '#212529';
            }

            //guardamos el nommbre limpio 
            $orden->nombre_limpio_estado = $nombreEstado;
            return $orden;
        });

        //Buscamos los favoritos del cliente en DBeaver
        // Usamos 'with' para que de paso cargue toda la informacion de la joya (nombre, precio, imagen)
        $misFavoritos = Favoritos::where('usuario_id', $usuarioLogueadoId)->with('producto')->get();

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
        // Esto asegura que ES un usuario, no una coleccion.
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
        //CONTROL DE SEGURIDAD: Si no esta logueado, va al login
        if (!Auth::check()) {
            return redirect()->route('login')->with('info', 'Debes iniciar sesión para agregar favoritos.');
        }

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

        // Volvemos al dashboard y se muestra un mensaje
        return back()->with('status', 'Producto eliminado de tu lista de deseos.');
    }
}
