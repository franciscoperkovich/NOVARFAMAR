<?php

use Illuminate\Support\Facades\Route;
// 1. IMPORTACIONES (Siempre van arriba de todo)
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;

// 2. RUTAS PÚBLICAS DE LA TIENDA (NovaFarmar)
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


// 3. RUTAS DE AUTENTICACIÓN (Formularios para ver las pantallas)
Route::get('/registro', [AuthController::class, 'formularioRegistro']);
Route::get('/login', [AuthController::class, 'formularioLogin']);


// 4. RUTAS PARA PROCESAR LOS FORMULARIOS (Envío de datos POST)
Route::post('/registro', [AuthController::class, 'registrar']);
Route::post('/login', [AuthController::class, 'autenticar']);
Route::post('/logout', [AuthController::class, 'logout']);


// 5. RUTAS DE LOS PANELES DE USUARIO (Según el rol)
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/cliente/dashboard', [ClienteController::class, 'index']);