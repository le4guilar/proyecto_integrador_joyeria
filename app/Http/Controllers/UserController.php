<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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
        // 
        $provincias = DB::table('provincia')->get();
        
        // 
        $roles = DB::table('rol')->get(); 

        return view('Backend.Usuario.create', compact('provincias', 'roles'));
    }

}
