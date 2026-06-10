@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2>

        Venta #{{ $venta->id }}

    </h2>

    <p>

        Cliente:
        <strong>{{ $venta->usuario->name }}</strong>

    </p>

    <p>

        Total:
        <strong>
            ${{ number_format($venta->total,2,',','.') }}
        </strong>

    </p>

    <table class="table">

        <thead>

            <tr>

                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>

            </tr>

        </thead>

        <tbody>

        @foreach($venta->detalles as $detalle)

            <tr>

                <td>

                    {{ $detalle->producto->nombre }}

                </td>

                <td>

                    {{ $detalle->cantidad }}

                </td>

                <td>

                    ${{ $detalle->precio_unitario }}

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection