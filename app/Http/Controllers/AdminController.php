<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        // Aquí puedes cargar métricas desde la base de datos (Ej: Ventas, Usuarios)
        return view('Admin.dashboard');
    }

}
