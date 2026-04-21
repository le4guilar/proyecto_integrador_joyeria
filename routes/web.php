<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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