<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index()
    {
        $productos = Producto::where('activo', 1)->get();
        $ventas = Venta::where('user_id', Auth::id())->get();

        return view('backend.usuarios.cliente', compact('productos', 'ventas'));
    }
}