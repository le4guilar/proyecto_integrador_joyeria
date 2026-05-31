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
        return view('Backend.CategoriaJoya.index', compact('categoria_joya'));
    }

    public function create()
    {
        return view('Backend.CategoriaJoya.crear');
    }

    public function store(Request $request)
    {
        // se valida que se cumplan los requisitos de la tabla categoria joya
        $data = $request->validate([
            'nombre_categoria' => 'required|string|max:15'
        ]);


        // se crea la categoria de joya en la tabla que le corresponde usando el modeloo
        CategoriaJoya::create([
            'nombre_categoria' => $data['nombre_categoria']
        ]);

        //te devuelve al índice con el mensaje q te salió bien. felicidades sos un@ cap@
        return redirect()->route('categoria-joyas.index')->with('success', '¡Categoría creada con éxito!');
    }

    public function edit($id)
    {
        // se busca el id de la categoria que queremos borrar, si no encuentra tira un 404
        $categoria = CategoriaJoya::findOrFail($id);

        //  cuando encuentra se le pasa ese registro a la vista de edicion
        return view('Backend.CategoriaJoya.editar', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        // se verifica q los datos de entrada sean correctos
        $data = $request->validate([
            'nombre_categoria' => 'required|string|max:15',

        ]);

        // buscamos ese registro en la base de datos
        $categoria = CategoriaJoya::findOrFail($id);

        // se actualiza el registro con el nuevo dato
        $categoria->update([
            'nombre_categoria' => $data['nombre_categoria'],
        ]);

        // vamos al index de categorías con un mensaje de exito 
        return redirect()->route('categoria-joyas.index')->with('success', '¡Categoría actualizada con éxito!');
    }

    public function destroy($id)
    {
        //se busca el registro de la categoria por su id
        $categoria = CategoriaJoya::findOrFail($id);

        // se hace delete pero como tiene soft delte solo que carga la columna deleted_at
        $categoria->delete();

        // redirigimos al indice con un msj de exito
        return redirect()->route('categoria-joyas.index')->with('success', '¡Registro eliminado con éxito!');
    }
}
