<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaJoya;


class CategoriaJoyaController extends Controller
{
    public function index()
    {   
        //se llaman a todos los registros de la tabla categoría joya con el nombre del modelo
        $categoria_joya = CategoriaJoya::all(); 

        //devolvemos la vista y le pasamos las categorias usando compact
        return view('backend.CategoriaJoya.index', compact('categoria_joya'));
    }

    public function create() 
    {
        return view('backend.CategoriaJoya.crear');
    }

    public function store(Request $request) 
    {
        // se valida que se cumplan los requisitos de la tabla categoria joya
        $data = $request -> validate([
            'nombre_categoria' => 'required|string|max:15'
        ]);


        // se crea la categoria de joya en la tabla que le corresponde usando el modeloo
        CategoriaJoya::create([
            'nombre_categoria' => $data['nombre_categoria']
        ]);

        //te devuelve al índice con el mensaje q te salió bien. felicidades sos un@ cap@
        return redirect()->route('CategoriaJoya.index')->with('success', '¡Categoría creada con éxito!');


    }

}
