<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        //se llaman a todos los registros de la tabla categoría joya con el nombre del modelo
        $productos = Producto::all();

        //devolvemos la vista y le pasamos las categorias usando compact
        return view('Backend.Producto.index', compact('productos'));
    }
    
    public function create()
    {
        return view('backend.Producto.crear');
    }
}
