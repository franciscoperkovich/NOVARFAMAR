<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id', 'asc')
                             ->paginate(10);

        return view(
            'backend.admin.productos.index',
            compact('productos')
        );
    }

    public function crear()
    {
        return view('backend.admin.productos.crear');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'url_imagen'  => 'nullable|url',
        ]);

        Producto::create([

            'nombre'      => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio'      => $request->precio,
            'stock'       => $request->stock,
            'url_imagen'  => $request->url_imagen,
            'tipo'        => $request->tipo,
            'activo'      => true

        ]);

        return redirect('/admin/productos')
            ->with(
                'success',
                'Producto creado correctamente.'
            );
    }

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);

        return view(
            'backend.admin.productos.editar',
            compact('producto')
        );
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'url_imagen'  => 'nullable|url',
        ]);

        $producto = Producto::findOrFail($id);

        $producto->update([

            'nombre'      => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio'      => $request->precio,
            'stock'       => $request->stock,
            'url_imagen'  => $request->url_imagen,
            'tipo'        => $request->tipo,
            'activo'      => $request->has('activo')

        ]);

        return redirect('/admin/productos')
            ->with(
                'success',
                'Producto actualizado correctamente.'
            );
    }

    public function eliminar($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update([

            'activo' => false

        ]);

        return redirect('/admin/productos')
            ->with(
                'success',
                'Producto eliminado correctamente.'
            );
    }
}