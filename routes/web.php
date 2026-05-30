<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoriaJoyaController;


Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
return view('home');
});

Route::get('/nosotros', function () {
return view('nosotros');
});

Route::get('/productos', function () {
return view('productos');
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

Route::get('/productos', function () {
    return view('productos'); 
})->name('catalogo.p1'); 

Route::get('/catalogo-parte-2', function () {
    return view('catalogo2'); 
})->name('catalogo.p2');

Route::post('/contacto', [ContactoController::class, 'procesar']);

Route::middleware(['auth', 'rol:admin'])-> group(function(){
    Route::get('/admin', [AdminController::class, 'dashboard']);
    //Esta linea invoca al recurso CRUD(?) de CategoríaJoya con el middleware doble
    Route::resource('categoria-joya', CategoriaJoyaController::class);

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
Route::get('/cliente', function () {
    return view('backend.usuarios.cliente');
})->middleware('auth')->name('cliente');


