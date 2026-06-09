<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoriaJoyaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarritoController;


Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
return view('home');
});

Route::get('/nosotros', function () {
return view('nosotros');
});

Route::get('/catalogo1', function () {
return view('catalogo1');
});

Route::get('/contacto', function () {
return view('contacto');
});

Route::get('/patio', function () {
return view('patio');
});

Route::get('/comercializacion', function () {
return view('comercializacion');
});

Route::get('/terminos-de-uso', function () {
return view('terminos-de-uso');
});

Route::get('/catalogo1', function () {
    return view('catalogo1'); 
})->name('catalogo1'); 

Route::get('/catalogo2', function () {
    return view('catalogo2'); 
})->name('catalogo2');

Route::post('/contacto', [ContactoController::class, 'procesar']);

Route::middleware(['auth', 'rol:admin'])-> group(function(){
    Route::get('admin', [AdminController::class, 'index'])->name('dashboard');
    //Esta linea invoca al recurso CRUD(?) de CategoríaJoya con el middleware doble
    Route::resource('categoria-joyas', CategoriaJoyaController::class);
    //Esta linea invoca al recurso CRUD(?) de Producto con el middleware doble
    Route::resource('productos', ProductoController::class);
    //ahora el recurso CRUD de usuario para el usuario logueado y rol admin
    Route::resource('usuarios', UserController::class);
    // mostramos la lista de ciudades
    Route::get('/obtener-ciudades/{provinciaId}', [UserController::class, 'obtenerCiudades']);

    Route::patch('productos/{id}/restore', [ProductoController::class, 'restore'])->name('productos.restore');
}); // la capa intermedia con dobre verif, si estas en sesion (iniciaste sesión) y si tu usuario es admin entonces te permite tener la vista admin y ejecutar la función dashboard


// este bloque de código establece las los get y post de login y registro que son exclusivas para los que no están logueados, una vez logueados 
// como admin o cliente entonces ya no se puede acceder a ellas
// para eso habrá que salir de la sesión
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'autenticar']);
    
    Route::get('/registro', [AuthController::class, 'formularioRegistro'])->name('registro');
    Route::post('/registro', [AuthController::class, 'registrar']);
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/api/provincias/{id}/ciudades', function($id) {
    return response()->json(DB::table('ciudad')->where('provincia_id', $id)->get());
}); // esta ruta devuelve las ciudades en función de la provincia seleccionadd



// Ruta para el panel o dashboard del cliente
//se cambio la funcion vacia para que llame al metodo 'dashboard' del ClienteController
Route::get('/cliente', [ClienteController::class, 'dashboard'])->middleware('auth')->name('cliente');


//CARRITO
// 1. Caminito para ver el carrito en la pantalla que creamos recién
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');

// 2. Caminito que se activa cuando tocás "Agregar al carrito" en el catálogo
Route::post('/carrito/agregar', [CarritoController::class, 'store'])->name('carrito.store');

// 3. Caminito para el botón de "Quitar" (el tachito de basura)
Route::delete('/carrito/quitar/{id}', [CarritoController::class, 'destroy'])->name('carrito.destroy');
