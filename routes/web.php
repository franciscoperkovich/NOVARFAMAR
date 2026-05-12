<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categoria1', function () {
    return view('categoria1');
});

Route::get('/categoria2', function () {
    return view('categoria2');
});

Route::get('/categoria3', function () {
    return view('categoria3');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/registros', function () {
    return view('registros');
});

Route::get('/acercaNosotros', function () {
    return view('acercaNosotros');
});

Route::get('/terminos', function () {
    return view('terminos');
});

Route::get('/carrito', function () {
    return view('carrito');
});