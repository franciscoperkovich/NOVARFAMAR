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

public function ventas(Request $request)
{
    $query = Venta::with('usuario')->latest();

    if ($request->filled('desde')) {
        $query->whereDate('created_at', '>=', $request->desde);
    }

    if ($request->filled('hasta')) {
        $query->whereDate('created_at', '<=', $request->hasta);
    }

    $ventas = $query->get();

    return view('backend.admin.ventas', compact('ventas'));
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

public function bajaUsuario($id)
{
    $usuario = User::findOrFail($id);

    // Nadie puede darse de baja a sí mismo
    if ($usuario->id == auth()->id()) {

        return back()->with(
            'error',
            'No puedes desactivar tu propia cuenta.'
        );

    }

    // Un administrador NO puede desactivar administradores
    // ni superadministradores
    if (
        auth()->user()->rol == 'admin' &&
        $usuario->rol != 'cliente'
    ) {

        return back()->with(
            'error',
            'Solo un Superadministrador puede desactivar administradores.'
        );

    }

    $usuario->update([
        'activo' => false
    ]);

    return back()->with(
        'success',
        'Usuario desactivado correctamente.'
    );
}

}