@extends('layouts.app')

@section('title', 'Mi Carrito')

@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="container mt-5">

    <h2 class="mb-4">
        Mi Carrito
    </h2>

    @php
        $total = 0;
    @endphp

    @forelse($items as $item)

        @php
            $subtotal = $item->producto->precio * $item->cantidad;
            $total += $subtotal;
        @endphp

        <div class="card mb-3">

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-md-2">

                        @if($item->producto->url_imagen)

    <img
        src="{{ $item->producto->url_imagen }}"
        class="img-fluid rounded"
        style="max-height:120px; object-fit:contain;">

@else

    <img
        src="https://cdn-icons-png.flaticon.com/512/2966/2966489.png"
        class="img-fluid rounded"
        style="max-height:120px; object-fit:contain;">

@endif

                    </div>

                    <div class="col-md-4">

                        <h5>
                            {{ $item->producto->nombre }}
                        </h5>

                        <small>
                            {{ $item->producto->descripcion }}
                        </small>

                    </div>

                    <div class="col-md-2">

                        ${{ $item->producto->precio }}

                    </div>

                    <div class="col-md-2">

<div class="d-flex align-items-center gap-2">

    <form method="POST"
          action="{{ route('carrito.quitar', $item->producto->id) }}">

        @csrf

        <button class="btn btn-danger btn-sm">
            -
        </button>

    </form>

    <span class="fw-bold">
        {{ $item->cantidad }}
    </span>

    <form method="POST"
          action="{{ route('carrito.agregar', $item->producto->id) }}">

        @csrf

        <button class="btn btn-success btn-sm">
            +
        </button>

    </form>

</div>

                    </div>

                    <div class="col-md-2 text-end">

                        ${{ number_format($subtotal, 2) }}

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="alert alert-info">

            Tu carrito está vacío

        </div>

    @endforelse

    <div class="card mt-4">

        <div class="card-body text-end">

            <h3>

                Total:
                ${{ number_format($total, 2) }}

            </h3>

        </div>

    </div>

    @if($items->count() > 0)

<form method="POST"
      action="{{ route('carrito.confirmar') }}">

    @csrf

    <button class="btn btn-success btn-lg">

        Confirmar Compra

    </button>

</form>

<form method="POST"
      action="{{ route('carrito.vaciar') }}"
      class="mt-2">

    @csrf

    <button class="btn btn-danger">

        Vaciar Carrito

    </button>

</form>

@endif

</div>

@endsection