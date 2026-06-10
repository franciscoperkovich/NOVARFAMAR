@extends('layouts.app')

@section('title', 'Ventas')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">

        Monitoreo de Ventas

    </h2>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th></th>

                    </tr>

                </thead>

                <tbody>

                @foreach($ventas as $venta)

                    <tr>

                        <td>
                            {{ $venta->id }}
                        </td>

                        <td>
                            {{ $venta->usuario->name }}
                        </td>

                        <td>
                            ${{ number_format($venta->total,2,',','.') }}
                        </td>

                        <td>

                            <span class="badge bg-success">

                                {{ $venta->estado }}

                            </span>

                        </td>

                        <td>

                            {{ $venta->created_at->format('d/m/Y H:i') }}

                        </td>

                        <td>

                            <a href="/admin/ventas/{{ $venta->id }}"
                               class="btn btn-primary btn-sm">

                                Ver detalle

                            </a>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection