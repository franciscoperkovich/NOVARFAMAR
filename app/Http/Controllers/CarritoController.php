<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CarritoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Barryvdh\DomPDF\Facade\Pdf;

class CarritoController extends Controller
{
    public function index()
    {
        $items = CarritoItem::with('producto')
            ->where('user_id', Auth::id())
            ->get();

        return view('carrito.index', compact('items'));
    }

public function agregar(Request $request, $id)
{
    $producto = Producto::findOrFail($id);

    $cantidad = (int) $request->cantidad;

    if ($cantidad <= 0) {
        $cantidad = 1;
    }

    if ($producto->stock < $cantidad) {

        return back()->with(
            'error',
            'Stock insuficiente para ' .
            $producto->nombre
        );
    }

    $item = CarritoItem::where('user_id', Auth::id())
        ->where('producto_id', $id)
        ->first();

    if ($item) {

        $item->cantidad += $cantidad;
        $item->save();

    } else {

        CarritoItem::create([
            'user_id' => Auth::id(),
            'producto_id' => $id,
            'cantidad' => $cantidad
        ]);
    }

    $producto->stock -= $cantidad;
    $producto->save();

    return back()->with(
        'success',
        'Producto agregado al carrito'
    );
}

    public function quitar($id)
    {
        $item = CarritoItem::where('user_id', Auth::id())
            ->where('producto_id', $id)
            ->first();

        if (!$item) {
            return back();
        }

        $producto = Producto::findOrFail($id);

        $item->cantidad -= 1;

        if ($item->cantidad <= 0) {
            $item->delete();
        } else {
            $item->save();
        }

        $producto->stock += 1;
        $producto->save();

        return back();
    }

    public function confirmarCompra()
    {
        $items = CarritoItem::with('producto')
            ->where('user_id', Auth::id())
            ->get();

        if ($items->isEmpty()) {
            return back();
        }

        $total = 0;
        foreach ($items as $item) {
            $total += $item->cantidad * $item->producto->precio;
        }

        $venta = Venta::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'estado' => 'confirmada'
        ]);

        foreach ($items as $item) {
            DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto_id' => $item->producto_id,
                'cantidad' => $item->cantidad,
                'precio_unitario' => $item->producto->precio
            ]);
        }

        CarritoItem::where('user_id', Auth::id())->delete();

        // Generar y descargar PDF
        $venta->load('detalles.producto');
        $usuario = Auth::user();

        $pdf = Pdf::loadView('pdf.factura', compact('venta', 'usuario'));

        return $pdf->download('factura-' . $venta->id . '.pdf');
    }

    public function misCompras()
    {
        $ventas = Venta::where('user_id', auth()->id())->latest()->get();
        return view('carrito.mis-compras', compact('ventas'));
    }

    public function vaciar()
    {
        CarritoItem::where('user_id', auth()->id())->delete();
        return back()->with('success', 'Carrito vaciado correctamente');
    }
}