<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Muestra el panel principal del cliente
    public function index()
    {
        return view('backend.usuarios.cliente');
    }
}