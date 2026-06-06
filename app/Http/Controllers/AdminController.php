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
}