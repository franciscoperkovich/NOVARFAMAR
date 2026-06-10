<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producto;
use App\Models\Venta;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        $productos = Producto::all();
        $ventas = Venta::all();

        return view('backend.admin.dashboard', compact('usuarios', 'productos', 'ventas'));
    }

    public function usuarios()
{
    $usuarios = User::all();

    return view(
        'backend.admin.usuarios',
        compact('usuarios')
    );
}

public function ventas()
{
    $ventas = Venta::with('usuario')
                    ->latest()
                    ->get();

    return view(
        'backend.admin.ventas',
        compact('ventas')
    );
}

public function detalleVenta($id)
{
    $venta = Venta::with(
        'usuario',
        'detalles.producto'
    )->findOrFail($id);

    return view(
        'backend.admin.detalleVenta',
        compact('venta')
    );
}

}