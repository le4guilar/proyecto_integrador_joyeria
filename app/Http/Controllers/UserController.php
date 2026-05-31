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
        // primero q nada, validamos para no meter la pata
        $data = $request->validate([
            'nombre'            => 'required|string|max:225',
            'apellido'          => 'required|string|max:225',
            'email'             => 'required|email|unique:users,email',
            'password'          => 'required|min:4',
            'rol_id'            => 'required|integer',
            'ciudad_id'         => 'required|integer', 
            'detalle_domicilio' => 'required|string|max:255' 
        ]);

        // 2. Usamos una transacción por seguridad
        DB::transaction(function () use ($data) {
            // Creamos el domicilio y obtenemos su ID
            $domicilio_id = DB::table('domicilio')->insertGetId([
                'detalle_domicilio' => $data['detalle_domicilio'],
                'ciudad_id'         => $data['ciudad_id'],
                'created_at'        => now(),
                'updated_at'        => now()
            ]);

            // Creamos el usuario vinculándolo al rol y al domicilio creado
            User::create([
                'nombre'       => $data['nombre'],
                'apellido'     => $data['apellido'],
                'email'        => $data['email'],
                'password'     => Hash::make($data['password']),
                'rol_id'       => $data['rol_id'], 
                'domicilio_id' => $domicilio_id,
            ]);
        });

        // 3. Redirigimos al index del CRUD con mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario registrado correctamente.');
    }

}
