@extends('layouts.app')

@section('title', 'Medicamentos')

@section('content')

<div class="container mt-4">

    <h1 class="text-center fw-bold mb-4">
        Medicamentos
    </h1>

    <div id="carouselPagina1"
         class="carousel slide carousel-fade shadow-lg mb-5 custom-carousel"
         data-bs-ride="carousel"
         data-bs-interval="3000">

        <div class="carousel-inner rounded-4 overflow-hidden">

            <div class="carousel-item active">
                <img src="{{ asset('img/productos/medicamentos/portada7.png') }}"
                     class="d-block w-100">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/productos/medicamentos/portada2.png') }}"
                     class="d-block w-100">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/productos/medicamentos/portada3.png') }}"
                     class="d-block w-100">
            </div>

        </div>

        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselPagina1"
                data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>

        <button class="carousel-control-next"
                type="button"
                data-bs-target="#carouselPagina1"
                data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>

    </div>

    <h3 class="fw-bold text-center mb-4">
        Medicamentos Disponibles
    </h3>

    <div class="row">

        @forelse($productos as $producto)

        <div class="col-md-4 mb-4">

            <div class="card h-100 shadow-sm border-0">

                <img src="{{ $producto->url_imagen }}"
                     class="card-img-top"
                     style="height:250px; object-fit:cover;">

                <div class="card-body text-center">

                    <h5 class="fw-bold">
                        {{ $producto->nombre }}
                    </h5>

                    <p class="text-muted">
                        {{ $producto->descripcion }}
                    </p>

                    <h4 class="text-success fw-bold">
                        ${{ number_format($producto->precio, 2, ',', '.') }}
                    </h4>

                    <p>
                        Stock disponible:
                        {{ $producto->stock }}
                    </p>

                    @auth

                    <form action="{{ route('carrito.agregar', $producto->id) }}"
                          method="POST">

                        @csrf

                        <button class="btn btn-success">

                            <i class="bi bi-cart-plus"></i>
                            Agregar

                        </button>

                    </form>

                    @else

                    <a href="/login"
                       class="btn btn-outline-success">

                        Iniciar sesión para comprar

                    </a>

                    @endauth

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-warning text-center">

                No hay medicamentos cargados.

            </div>

        </div>

        @endforelse

    </div>

</div>

@endsection