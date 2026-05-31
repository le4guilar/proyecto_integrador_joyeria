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
            'nombre_joya' => 'required|string|max:225',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|interger|min:0',
            'categoria_joya_id' => 'required|integer',
            'genero_joya_id' => 'required|integer',
            'descripcion' => 'nillable|string',
            'url_imagen'        => 'nullable|string', // se añadio el campo de la foto
        ]);

        Producto::create([
            'nombre_joya'       => $request->input('nombre_joya'),
            'descripcion'       => $request->input('descripcion'),
            'precio_unitario'   => $request->input('precio_unitario'),
            'stock'             => $request->input('stock'),
            'stock_bajo'        => $request->input('stock_bajo'),
            'url_imagen'        => $request->input('url_imagen'),
            'activo'            => true, // Nace activo por defecto
            'categoria_joya_id' => $request->input('categoria_joya_id'),
            'genero_joya_id'    => $request->input('genero_joya_id'),
        ]);
        
        return redirect()->route('producto.index')->with('status', '¡Joya cargada con éxito');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        
        // Como el modelo usa SoftDeletes, esto hace un borrado logico (no borra el registro, lo oculta)
        $producto->delete();

        return redirect()->route('producto.index')->with('status', 'Joya dada de baja correctamente.');
    }
}
