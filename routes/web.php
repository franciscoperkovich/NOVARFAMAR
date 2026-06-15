<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Models\Producto;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PerfilController;

Route::get('/', function () {

    $productos = Producto::where('activo', true)->get();

    return view('welcome', compact('productos'));

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

    Route::get(
        '/admin/consultas',
        [ConsultaController::class, 'index']
    );

     Route::get(
        '/admin/usuarios',
        [AdminController::class, 'usuarios']
    );

    Route::get(
    '/admin/ventas',
    [AdminController::class, 'ventas']
);

Route::get(
    '/admin/ventas/{id}',
    [AdminController::class, 'detalleVenta']
);

Route::put(
    '/admin/consultas/{id}/leer',
    [ConsultaController::class, 'marcarLeida']
);

});

Route::middleware(['auth', 'rol:cliente'])->group(function () {

    Route::get(
        '/cliente/dashboard',
        [ClienteController::class, 'index']
    );

    Route::get(
        '/perfil',
        [PerfilController::class, 'index']
    )->name('perfil');

    Route::post(
        '/perfil/actualizar',
        [PerfilController::class, 'actualizar']
    )->name('perfil.actualizar');



});

Route::middleware(['auth'])->group(function () {

    Route::get(
        '/carrito',
        [CarritoController::class, 'index']
    )->name('carrito.index');

    Route::post(
        '/carrito/agregar/{id}',
        [CarritoController::class, 'agregar']
    )->name('carrito.agregar');

    Route::post(
        '/carrito/quitar/{id}',
        [CarritoController::class, 'quitar']
    )->name('carrito.quitar');

    Route::post(
    '/carrito/confirmar',
    [CarritoController::class, 'confirmarCompra']
)->name('carrito.confirmar');

Route::get(
    '/mis-compras',
    [CarritoController::class, 'misCompras']
)->name('miscompras');

Route::post(
    '/carrito/vaciar',
    [CarritoController::class, 'vaciar']
)->name('carrito.vaciar');

Route::post(
    '/contacto',
    [ConsultaController::class, 'guardar']
)->name('consultas.guardar');

Route::get(
    '/factura/{id}',
    [CarritoController::class, 'descargarFactura']
)->name('factura.descargar');

});

Route::get('/categoria1', function () {

    $productos = Producto::where(
        'tipo',
        'medicamento'
    )->where(
        'activo',
        true
    )->get();

    return view(
        'categoria1',
        compact('productos')
    );

});

Route::get('/categoria2', function () {

    $productos = Producto::where(
        'tipo',
        'cuidado_personal'
    )->where(
        'activo',
        true
    )->get();

    return view(
        'categoria2',
        compact('productos')
    );

});