<?php

namespace App\Http\Controllers;

use App\Models\CategoriaJoya;
use App\Models\GeneroJoya;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        // Iniciamos la consulta permitiendo traer los eliminados
        $query = Producto::withTrashed();

        // Filtro por Categoría
        if ($request->filled('categoria_id')) {
            $query->where('categoria_joya_id', $request->categoria_id);
        }

        // Filtro por Género
        if ($request->filled('genero_id')) {
            $query->where('genero_joya_id', $request->genero_id);
        }

        // Orden por precio (Mayor/Menor o Viceversa)
        if ($request->filled('orden_precio')) {
            if ($request->orden_precio === 'asc') {
                $query->orderBy('precio_unitario', 'asc');
            } elseif ($request->orden_precio === 'desc') {
                $query->orderBy('precio_unitario', 'desc');
            }
        } else {
            // Orden por defecto por si no eligen nada (ej: los más nuevos primero)
            $query->orderBy('id', 'desc');
        }

        // Filtro por Nombre (Buscador)
        if ($request->filled('buscar')) {
            $query->where('nombre_joya', 'like', '%' . $request->buscar . '%');
        }

        // Ejecutamos la consulta con los filtros aplicados
        $productos = $query->get();

        // Necesitamos las categorías y géneros para cargarlos en los selectores del formulario de filtro
        $categorias = CategoriaJoya::all();
        $generos = GeneroJoya::all();

        // Devolvemos la vista pasando todo con compact
        return view('Admin.Producto.index', compact('productos', 'categorias', 'generos'));
    }


    public function create()
    {
        // Traemos las categorías y géneros para los selectores del formulario
        $categorias = CategoriaJoya::all();
        $generos = GeneroJoya::all();

        // Reemplaza 'Admin.Producto.crear' por el nombre exacto de la vista de tu formulario
        return view('Admin.Producto.crear', compact('categorias', 'generos'));
    }

    public function store(Request $request)
    {

        // primero que nada validamos todoO0
        $data = $request->validate([
            'nombre_joya'       => 'required|string|max:50',
            'descripcion'       => 'required|string|max:200',
            'precio_unitario'   => 'required|numeric|min:0',
            'stock'             => 'required|integer|min:0',
            'stock_bajo'        => 'required|integer|min:0',
            'categoria_joya_id' => 'required|integer',
            'genero_joya_id'    => 'required|integer',
            'url_imagen'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20000',
        ]);

        // primero definimos el nombre de la imagen como null
        // si hay una imagen cargada bueno, se guarda la url en nombreimagen paaaa
        $nombreImagen = null;
        if ($request->hasFile('url_imagen')) {
            // Guarda el archivo en storage/app/public/productos
            $nombreImagen = $request->file('url_imagen')->store('productos', 'public');
        }

        // ahora creamos el registro en la base de datos
        Producto::create([
            'nombre_joya'       => $data['nombre_joya'],
            'descripcion'       => $data['descripcion'],
            'precio_unitario'   => $data['precio_unitario'],
            'stock'             => $data['stock'],
            'stock_bajo'        => $data['stock_bajo'],
            'url_imagen'        => $nombreImagen, // Guardamos la ruta de la imagen que se genero mirraaayy
            'activo'            => true,
            'categoria_joya_id' => $data['categoria_joya_id'],
            'genero_joya_id'    => $data['genero_joya_id'],
        ]);

        // anduvo todo bien? volvemos al indice con un mensaje paaa
        return redirect()->route('productos.index')->with('status', '¡Joya cargada con éxito!');
    }

    public function update(Request $request, $id)
    {
        // Buscamos la joya que queremos editar
        $producto = Producto::findOrFail($id);

        // Validamos con el mismo formato que armó Leandro
        $data = $request->validate([
            'nombre_joya'       => 'required|string|max:50',
            'descripcion'       => 'required|string|max:200',
            'precio_unitario'   => 'required|numeric|min:0',
            'stock'             => 'required|integer|min:0',
            'stock_bajo'        => 'required|integer|min:0',
            'categoria_joya_id' => 'required|integer',
            'genero_joya_id'    => 'required|integer',
            'url_imagen'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20000',
        ]);

        // Por defecto dejamos la imagen vieja que ya estaba en DBeaver
        $nombreImagen = $producto->url_imagen;

        // Pero si el usuario subió una foto nueva, la reemplazamos paa
        if ($request->hasFile('url_imagen')) {
            $nombreImagen = $request->file('url_imagen')->store('productos', 'public');
        }

        // Actualizamos los datos en DBeaver
        $producto->update([
            'nombre_joya'       => $data['nombre_joya'],
            'descripcion'       => $data['descripcion'],
            'precio_unitario'   => $data['precio_unitario'],
            'stock'             => $data['stock'],
            'stock_bajo'        => $data['stock_bajo'],
            'url_imagen'        => $nombreImagen,
            'categoria_joya_id' => $data['categoria_joya_id'],
            'genero_joya_id'    => $data['genero_joya_id'],
        ]);

        return redirect()->route('productos.index')->with('status', '¡Joya actualizada con éxito!');
    }

    public function destroy($id)
    {
        // como siempre primero buscamos el id del producto que vamos a soft deletear (pobrecito)
        $producto = Producto::findOrFail($id);

        // aca de lo matamos (de mentirita)
        $producto->delete();

        // volvemos al index con el mensaje de exito
        return redirect()->route('productos.index')->with('status', 'Joya dada de baja correctamente.');
    }

    public function edit($id)
    {
        // Buscamos el producto por su ID en DBeaver
        $producto = Producto::findOrFail($id);

        // Buscamos las categorías y géneros para los selectores
        $categorias = CategoriaJoya::all();
        $genero = GeneroJoya::all();

        // Devolvemos la vista de edición pasándole los datos
        return view('Admin.Producto.editar', compact('producto', 'categorias', 'genero'));
    }

    public function restore($id)
    {
        // Buscamos únicamente entre los registros eliminados
        $producto = Producto::onlyTrashed()->findOrFail($id);

        // Lo restauramos en la base de datos (vuelve a estar activo)
        $producto->restore();

        return redirect()->route('productos.index')->with('status', '¡Producto puesto en venta nuevamente!');
    }

    //VERIFICAR: ESTO FUE LO ULTIMO QUE SE AGREGO (1), muestra una pagina solo del producto seleccionado para ver su descripcion y opciones
    //de aca se creo el Producto.show
    public function show($id){
    // Busca la joya por su ID en DBeaver. Si no existe, tira error 404
    $producto = Producto::findOrFail($id);
    
    // Nos lleva a la nueva vista pasándole los datos de esa joya sola
    return view('Cliente.Producto.show', compact('producto'));
    }

    // SE AGREGA UN SOLO MÉTODO PARA TODO EL CATÁLOGO AUTOMÁTICO (2)
    public function mostrarCatalogo(Request $request){
        // Iniciamos la consulta de productos activos
        $query = Producto::query();

        //  Filtro por Categoría
        if ($request->filled('categoria_id')) {
        $query->where('categoria_joya_id', $request->categoria_id);
        }

        //  Filtro por Nombre (Buscador)
        if ($request->filled('buscar')) {
            $query->where('nombre_joya', 'like', '%' . $request->buscar . '%');
        }

        //  Orden por precio
        if ($request->filled('orden_precio')) {
            if ($request->orden_precio === 'asc') {
                $query->orderBy('precio_unitario', 'asc');
            } elseif ($request->orden_precio === 'desc') {
                $query->orderBy('precio_unitario', 'desc');
            }
        } else {
            $query->orderBy('id', 'desc'); // Por defecto más nuevos primero
        }

        // Le pedimos a DBeaver que los separe en grupos de 9.
        $productos = $query->paginate(9);

        //SE CAMBIO DE PRODUCTOS A CATEGORIAS DE JOYAS 
        // Vamos a DBeaver a buscar todas las categorías para el selector de filtros
        $categorias = CategoriaJoya::all();
   

        // se manda todo a una sola vista general
        //  ACA LE AGREGAMOS EL 'categorias' ADENTRO DEL COMPACT:
        // Se lo mandamos a la vista junto con los productos
        return view('catalogo1', compact('productos', 'categorias'));
    }
}
