<?php

namespace App\Http\Controllers;

use App\Models\CategoriaJoya;
use App\Models\GeneroJoya;
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
        //busca todas las categorias y generos que hay en Dbeaver
        $categorias = CategoriaJoya::all();
        $genero = GeneroJoya::all();
        return view('backend.Producto.crear', compact('categorias' , 'genero'));
    }

    public function store(Request $request){

        $request->validate([
            'nombre_producto' => 'required|string|max:225',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|interger|min:0',
            'categoria_joya_id' => 'required|interger',
            'genero_joya_id' => 'required|interger',
            'descripcion' => 'nillable|string',
        ]);

        Producto::create([
            'nombre_producto' => $request->input('nombre_producto'),
            'precio' => $request->input('precio'),
            'stock' => $request->input('stock'),
            'categoria_joya_id' => $request->input('categoria_joya_id'),
            'genero_joya_id'  => $request->input('genero_joya_id'),
            'descipcion'  => $request->input('descipcion'),
        ]);
        
        return redirect()->route('producto.index')->with('status', '¡Joya cargada con éxito');
    }
}
