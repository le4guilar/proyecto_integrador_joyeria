<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
    public function index()
    {
        // traemos todos los usuarios con su rol
        $usuarios = User::with('rol')->get();

        // devolvemos la vista index de usuario pasandole el ¿array? de usuarios
        return view('Backend.Usuario.index', compact('usuarios'));
    }

    public function create()
    {
        // trae todas las provincias habidas y por haber
        $provincias = DB::table('provincia')->get();

        // trae todos los roles habidos y por haber
        $roles = DB::table('rol')->get();

        // vamos a la vista crear mandandole las provincias y los roles
        return view('Backend.Usuario.crear', compact('provincias', 'roles'));
    }

    public function store(Request $request)
    {

        // primero que nada validamos la info que nos llegó para no meter la pata
        $data = $request->validate([
            'nombre'            => 'required|string|max:225',
            'apellido'          => 'required|string|max:225',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|min:4',
            'rol_id'            => 'required|integer',
            'ciudad_id'         => 'required|integer',
            'detalle_domicilio' => 'required|string|max:255'
        ]);

        try {
            // arranca la transacción del domicilio
            DB::beginTransaction();

            // creamos el registro domicilio y nos devuelve el id que le toca
            $domicilio_id = DB::table('domicilio')->insertGetId([
                'detalle_domicilio' => $data['detalle_domicilio'],
                'ciudad_id'         => $data['ciudad_id'],
                'created_at'        => now(),
                'updated_at'        => now()
            ]);

            // creamos el usuario con el id del domicilio que creamos
            User::create([
                'nombre'       => $data['nombre'],
                'apellido'     => $data['apellido'],
                'email'        => $data['email'],
                'password'     => Hash::make($data['password']),
                'rol_id'       => $data['rol_id'],
                'domicilio_id' => $domicilio_id,
            ]);

            // si está todo oka, mete commit? en la base de datos
            DB::commit();

            //volvemos al index con el mensaje de exito paa
            return redirect()->route('usuarios.index')->with('success', 'Usuario registrado correctamente.');
        } catch (\Exception $e) {
            // si hay algún problema entonces se cancela todo y volvemos al indice con el mensaje
            DB::rollBack();
            return back()->withErrors(['error' => 'No se pudo registrar el usuario. Intente nuevamente.'])->withInput();
        }
    }

    //esta función toma las ciudades paa
    public function obtenerCiudades($provinciaId)
    {

        $ciudades = DB::table('ciudad')->where('provincia_id', $provinciaId)->get();
        return response()->json($ciudades);
    }

    public function edit($id)
    {
        // primero qq nada, buscamos el usuario con su rol y domicilio asociados
        $usuario = User::with(['rol', 'domicilio'])->findOrFail($id);

        // ahora geteamos?(obtenemos) el rol y la provincia del loco
        $roles = DB::table('rol')->get();
        $provincias = DB::table('provincia')->get();

        // y buscamos las ciudades de la provincia q nos devolvio
        $ciudades = DB::table('ciudad')
            ->where('provincia_id', $usuario->domicilio->ciudad_id ? DB::table('ciudad')->where('id', $usuario->domicilio->ciudad_id)->value('provincia_id') : 0)
            ->get();

        return view('Backend.Usuario.editar', compact('usuario', 'roles', 'provincias', 'ciudades'));
    }


    //bueno una vez que seleccionamos todo lo q vamos a editar, ahora vamos a actualizar eso
    public function update(Request $request, $id)
    {
        // buscamos el usuario
        $usuario = User::findOrFail($id);

        // primero validamoss todo paa, ignoramos el id pq lo sacamos del correo 
        $data = $request->validate([
            'nombre'            => 'required|string|max:225',
            'apellido'          => 'required|string|max:225',
            'email'             => 'required|email|unique:users,email,' . $usuario->id,
            'password'          => 'nullable|min:4', // nullable pq no es obligatorio para editar
            'rol_id'            => 'required|integer',
            'ciudad_id'         => 'required|integer',
            'detalle_domicilio' => 'required|string|max:255'
        ]);


        try {
            // aca arranca la transacción
            DB::beginTransaction();

            //primero actualizamos el domicilio
            DB::table('domicilio')
                ->where('id', $usuario->domicilio_id)
                ->update([
                    'detalle_domicilio' => $data['detalle_domicilio'],
                    'ciudad_id'         => $data['ciudad_id'],
                    'updated_at'        => now()
                ]);

            // después los datos del usuario
            $datosUsuario = [
                'nombre'   => $data['nombre'],
                'apellido' => $data['apellido'],
                'email'    => $data['email'],
                'rol_id'   => $data['rol_id'],
            ];

            // si cambió la clave (distinto de vacío), hacemos hash de la clave y 
            if (!empty($data['password'])) {
                $datosUsuario['password'] = Hash::make($data['password']);
            }

            // guardamos los datos del usuario
            $usuario->update($datosUsuario);
            
            // metemos commit a la BD
            DB::commit();
            return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'No se pudieron guardar los cambios.'])->withInput();
        }
    }

    //vamo borrrar un usuario
    public function destroy($id)
    {
        //como siempre primero buscamos el usuario por su id
        $usuario = User::findOrFail($id);

        //le hacemos delete (que enrealidad es un softdelete)
        $usuario->delete();

        //volvemos a mostrar index con el mensaje
        return redirect()->route('usuarios.index')->with('success', 'Usuario dado de baja correctamente.');
    }


}
