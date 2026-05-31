<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // traemos todos los usuarios con su rol
        $usuarios = User::with('rol')->get();

        // devolvemos la vista index de usuario pasandole el ¿array? de usuarios
        return view('Backend.Usuario.index', compact('usuarios'));
    }

}
