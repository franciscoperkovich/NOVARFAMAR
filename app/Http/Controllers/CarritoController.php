<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CarritoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Venta;
use App\Models\DetalleVenta;

class CarritoController extends Controller
{
    public function index()
    {
        $items = CarritoItem::with('producto')
            ->where('user_id', Auth::id())
            ->get();

        return view('carrito.index', compact('items'));
    }

    public function agregar($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->stock <= 0) {
            return back();
        }

        $item = CarritoItem::where('user_id', Auth::id())
            ->where('producto_id', $id)
            ->first();

        if ($item) {

            $item->cantidad += 1;
            $item->save();

        } else {

            CarritoItem::create([
                'user_id' => Auth::id(),
                'producto_id' => $id,
                'cantidad' => 1
            ]);

        }

        $producto->stock -= 1;
        $producto->save();

        return back();
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

    if($items->isEmpty()){
        return back();
    }

    $total = 0;

    foreach($items as $item){

        $total +=
            $item->cantidad *
            $item->producto->precio;

    }

    $venta = Venta::create([

        'user_id' => Auth::id(),
        'total' => $total,
        'estado' => 'confirmada'

    ]);

    foreach($items as $item){

        DetalleVenta::create([

            'venta_id' => $venta->id,
            'producto_id' => $item->producto_id,
            'cantidad' => $item->cantidad,
            'precio_unitario' => $item->producto->precio

        ]);

    }

    CarritoItem::where(
        'user_id',
        Auth::id()
    )->delete();

    return redirect()
        ->route('carrito.index')
        ->with(
            'success',
            'Compra realizada correctamente'
        );
}

public function misCompras()
{
    $ventas = \App\Models\Venta::where(
        'user_id',
        auth()->id()
    )->latest()->get();

    return view(
        'carrito.mis-compras',
        compact('ventas')
    );
}

public function vaciar()
{
    \App\Models\CarritoItem::where(
        'user_id',
        auth()->id()
    )->delete();

    return back()->with(
        'success',
        'Carrito vaciado correctamente'
    );
}

}