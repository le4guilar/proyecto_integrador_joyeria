<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function formularioRegistro()
    {
        // Buscamos las provincias en la base de datos
        $provincias = DB::table('provincia')->get();

        // Se las pasamos a la vista usando compact
        return view('backend.usuarios.registro', compact('provincias'));
    }

    //muestra la vista con el formulario de login
    public function formularioLogin()
    {
        return view('backend.usuarios.login');
    }

    public function registrar(Request $request)
    {
        //Valida que los datos ingresados estén correctos
        // 1. Validamos los datos del usuario y los campos del domicilio
        $data = $request->validate([
            'nombre'   => 'required|string|max:225',
            'apellido'   => 'required|string|max:225',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'ciudad_id'        => 'required|integer', // Requerido para armar el domicilio
            'detalle_domicilio' => 'required|string|max:255' // Calle, número, etc.
        ]);

        // 2. Creamos primero el Domicilio en la base de datos
        $domicilio_id = DB::table('domicilio')->insertGetId([
            'detalle_domicilio' => $data['detalle_domicilio'],
            'ciudad_id'         => $data['ciudad_id'],
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

        //crea un nuevo registro en la tabla users con los datos se recibieron en el objeto(?) request
        $usuario = User::create([
            'nombre' => $data['nombre'], //cadena obligatoria de como máximo 225 caracteres
            'apellido' => $data['apellido'],
            'email' => $data['email'], // correo obligatorio y único en la tabla usuarios
            'password' => Hash::make($data['password']), //clave encriptada
            'rol_id' => '2', //rol cliente por defecto
            'domicilio_id' => $domicilio_id, // asociamos el domicilio creado
        ]);

        // Auth::login($usuario); [OPCIONAL LOGUEARLO]

        // return redirect('/cliente'); [REDIRIGIMOS A LA VISTA CLIENTE??]

        return redirect('/'); //redirige a la raíz [VER A DONDE QUEREMOS REDIRIGIR] si a una vista de usuario creado exito o raiz o lo logueamos
    }

    public function autenticar(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email', //el correo tiene q ser obligatorio y formato email
            'password' => 'required'
        ]);  //la clave es obligatoria

        // Auth::attempt() busca el usuario en la base de datos y compara la contraseña
        // Si coincide: inicia sesión y devuelve true
        // Si no coincide: devuelve false
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            if (Auth::user()->rol->nombre_rol === 'admin') { //si es admin
                return redirect('/admin');
            }

            return redirect('cliente'); //si no es admin es cliente
        }

        //si las credenciales son incorrectas (no es admin ni cliente) vuelve al login con el error
        return back()->withErrors(['email' => 'Email o contraseña incorrectos']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario que se autenticó

        $request->session()->invalidate(); //invalida la sesion y borra los datos
        $request->session()->regenerateToken(); // Regenera el token @csrf (el del formulario de ingreso)para seguridad 

        return redirect('home'); //redirige a una ruta pública (si no tiene nada a la raíz)
    }
}
