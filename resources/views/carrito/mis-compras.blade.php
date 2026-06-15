@extends('layouts.app')

@section('title', 'Mis Compras')

@section('content')

<div class="container mt-5">

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

    <h2 class="mb-4">
        Mis Compras
    </h2>

    @forelse($ventas as $venta)

        <div class="card mb-3 shadow-sm">

            <div class="card-body">

                <h5>
                    Compra #{{ $venta->id }}
                </h5>

                <p>
                    Fecha:
                    {{ $venta->created_at->format('d/m/Y H:i') }}
                </p>

                <p>
                    Estado:
                    {{ $venta->estado }}
                </p>

                <p class="fw-bold text-success">
                    Total:
                    ${{ number_format($venta->total, 2) }}
                </p>

                <a
    href="{{ route('factura.descargar', $venta->id) }}"
    class="btn btn-primary"
>
    Descargar Factura
</a>

            </div>

        </div>

    @empty

        <div class="alert alert-info">

            Todavía no realizaste compras.

        </div>

    @endforelse

</div>

@endsection