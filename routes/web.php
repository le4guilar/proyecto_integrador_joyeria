<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('patio');
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

Route::get('/catalogo/pagina1', function(){
    return view('catalogo1');
})->name('catalogo.p1');

Route::get('/catalogo/pagina2', function(){
    return view('catalogo2');
})->name('catalogo.p2');


Route::post('/contacto', [ContactoController::class, 'procesar']);

