<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;

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

Route::get('/registro', [AuthController::class, 'formularioRegistro']);
Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/registro', [AuthController::class, 'registrar']);
Route::post('/login', [AuthController::class, 'autenticar']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    Route::get('/admin/productos', [ProductoController::class, 'index']);
    Route::get('/admin/productos/crear', [ProductoController::class, 'crear']);
    Route::post('/admin/productos', [ProductoController::class, 'guardar']);
    Route::get('/admin/productos/{id}/editar', [ProductoController::class, 'editar']);
    Route::put('/admin/productos/{id}', [ProductoController::class, 'actualizar']);
    Route::delete('/admin/productos/{id}', [ProductoController::class, 'eliminar']);
});

Route::middleware(['auth', 'rol:cliente'])->group(function () {
    Route::get('/cliente/dashboard', [ClienteController::class, 'index']);
});