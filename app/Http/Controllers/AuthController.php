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
        return view('Cliente.Registro', compact('provincias'));
    }

    //muestra la vista con el formulario de login
    public function formularioLogin()
    {
        return view('Cliente.Login');
    }

    public function registrar(Request $request)
    {
        //Valida que los datos ingresados estén correctos
        // 1. Validamos los datos del usuario y los campos del domicilio
        $data = $request->validate([
            'nombre'   => 'required|string|max:225',
            'apellido'   => 'required|string|max:225',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed',
            'ciudad_id'        => 'required|integer', 
            'detalle_domicilio' => 'required|string|max:255' 
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
            'nombre' => $data['nombre'], 
            'apellido' => $data['apellido'],
            'email' => $data['email'], // correo obligatorio y único en la tabla usuarios
            'password' => Hash::make($data['password']), //clave encriptada
            'rol_id' => '2', //rol cliente por defecto
            'domicilio_id' => $domicilio_id, // asociamos el domicilio creado
        ]);



        Auth::login($usuario);

        // return redirect('/cliente'); [REDIRIGIMOS A LA VISTA CLIENTE??]
        return redirect()->route('cliente.dashboard')->with('success', 'Te registrste con ¡éxito!');
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

            //CAMBIO: se compara el id del rol directamente. 
            if (Auth::user()->rol->nombre_rol == 'admin') { //si es admin
                return redirect('/');
            }

            return redirect('/'); //si no es admin es cliente
        }

        //si las credenciales son incorrectas (no es admin ni cliente) vuelve al login con el error
        return back()->withErrors(['email' => 'Email o contraseña incorrectos']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario que se autenticó

        $request->session()->invalidate(); //invalida la sesion y borra los datos
        $request->session()->regenerateToken(); // Regenera el token @csrf (el del formulario de ingreso)para seguridad 

        return redirect('home');
    }
}
