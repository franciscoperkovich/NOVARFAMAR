<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function guardar(Request $request)
    {
        Consulta::create([

            'nombre' => $request->nombre,
            'email' => $request->email,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje

        ]);

        return back()->with(
            'success',
            'Consulta enviada correctamente'
        );
    }

    public function index()
    {
        $consultas = Consulta::latest()->get();

        return view(
            'backend.admin.consultas',
            compact('consultas')
        );
    }
}