<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\DB;



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
}); // la capa intermedia con dobre verif, si estas en sesion (iniciaste sesión) y si tu usuario es admin entonces te permite tener la vista admin y ejecutar la función dashboard

Route::get('/login', function() {
    return view('Backend/Usuarios/Login');
}); 



Route::get('/registro', function() {
    return view('Backend/Usuarios/registro');
}); //te lleva  a la vista registro

Route::get('/registro', [AuthController::class, 'formularioRegistro']);

Route::post('/registro', [AuthController::class, 'registrar']); //es un post(?) que viene desde la vista registro y llama a la funcion registrar que está en la clase controlador authcontroller [creo que es eso e]


Route::get('/api/provincias/{id}/ciudades', function($id) {
    return response()->json(DB::table('ciudad')->where('provincia_id', $id)->get());
}); // esta ruta devuelve las ciudades en función de la provincia seleccionadd
