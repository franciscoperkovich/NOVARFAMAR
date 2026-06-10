<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    // Listar todos los productos
    public function index()
    {
        $productos = Producto::all();
        return view('backend.admin.productos.index', compact('productos'));
    }

    // Mostrar formulario de crear
    public function crear()
    {
        return view('backend.admin.productos.crear');
    }

    // Guardar producto nuevo
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
            'activo'      => true,
        ]);

        return redirect('/admin/productos')->with('success', 'Producto creado con éxito.');
    }

    // Mostrar formulario de editar
    public function editar($id)
    {
        $producto = Producto::findOrFail($id);
        return view('backend.admin.productos.editar', compact('producto'));
    }

    // Actualizar producto
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
            'activo'      => $request->has('activo') ? true : false,
        ]);

        return redirect('/admin/productos')->with('success', 'Producto actualizado.');
    }

    // Baja lógica
    public function eliminar($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update(['activo' => false]);

        return redirect('/admin/productos')->with('success', 'Producto dado de baja.');
    }
}