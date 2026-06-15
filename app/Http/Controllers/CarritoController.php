<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CarritoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $cantidad = (int) $request->input('cantidad', 1);

        if ($cantidad <= 0) {
            $cantidad = 1;
        }

        if ($producto->stock < $cantidad) {
            return back()->with(
                'error',
                'Stock insuficiente para ' . $producto->nombre
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

        $item->cantidad -= 1;

        if ($item->cantidad <= 0) {
            $item->delete();
        } else {
            $item->save();
        }

        return back();
    }

    public function confirmarCompra()
    {
        $items = CarritoItem::with('producto')
            ->where('user_id', Auth::id())
            ->get();

        if ($items->isEmpty()) {
            return back()->with(
                'error',
                'El carrito está vacío'
            );
        }

        try {

            DB::beginTransaction();

            $total = 0;

            foreach ($items as $item) {

                $producto = Producto::findOrFail(
                    $item->producto_id
                );

                if ($producto->stock < $item->cantidad) {

                    DB::rollBack();

                    return back()->with(
                        'error',
                        'No hay stock suficiente para '
                        . $producto->nombre
                    );
                }

                $total +=
                    $item->cantidad *
                    $producto->precio;
            }

            $venta = Venta::create([
                'user_id' => Auth::id(),
                'total' => $total,
                'estado' => 'confirmada'
            ]);

            foreach ($items as $item) {

                $producto = Producto::findOrFail(
                    $item->producto_id
                );

                $producto->stock -= $item->cantidad;
                $producto->save();

                DetalleVenta::create([
                    'venta_id' => $venta->id,
                    'producto_id' => $item->producto_id,
                    'cantidad' => $item->cantidad,
                    'precio_unitario' => $producto->precio
                ]);
            }

            CarritoItem::where(
                'user_id',
                Auth::id()
            )->delete();

            DB::commit();

            return redirect()
    ->route('miscompras')
    ->with(
        'success',
        'Compra realizada correctamente'
    );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with(
                'error',
                'Error al procesar la compra: '
                . $e->getMessage()
            );
        }
    }

    public function misCompras()
    {
        $ventas = Venta::where(
            'user_id',
            auth()->id()
        )->latest()->get();

        return view(
            'carrito.mis-compras',
            compact('ventas')
        );
    }

    public function descargarFactura($id)
{
    $venta = Venta::with('detalles.producto')
        ->where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $usuario = Auth::user();

    $pdf = Pdf::loadView(
        'pdf.factura',
        compact('venta', 'usuario')
    );

    return $pdf->download(
        'factura-' . $venta->id . '.pdf'
    );
}

    public function vaciar()
    {
        CarritoItem::where(
            'user_id',
            auth()->id()
        )->delete();

        return back()->with(
            'success',
            'Carrito vaciado correctamente'
        );
    }
}