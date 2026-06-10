@extends('layouts.app')

@section('title', 'Cuidado Personal')

@section('content')

<div class="container mt-4">

    <h1 class="text-center fw-bold mb-4">
        Cuidado Personal
    </h1>

    <div id="carouselPagina2"
         class="carousel slide carousel-fade shadow-lg mb-5 custom-carousel"
         data-bs-ride="carousel"
         data-bs-interval="3000">

        <div class="carousel-inner rounded-4 overflow-hidden">

            <div class="carousel-item active">
                <img src="{{ asset('img/productos/cuidadoPersonal/portada1.png') }}"
                     class="d-block w-100">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/productos/cuidadoPersonal/portada2.png') }}"
                     class="d-block w-100">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/productos/cuidadoPersonal/portada3.png') }}"
                     class="d-block w-100">
            </div>

        </div>

    </div>

    <h3 class="fw-bold text-center mb-4">
        Productos de Cuidado Personal
    </h3>

    <div class="row">

        @forelse($productos as $producto)

        <div class="col-md-4 mb-4">

            <div class="card h-100 shadow-sm">

                <img src="{{ $producto->url_imagen }}"
                     class="card-img-top"
                     style="height:250px; object-fit:cover;">

                <div class="card-body text-center">

                    <h5>{{ $producto->nombre }}</h5>

                    <p>{{ $producto->descripcion }}</p>

                    <h4 class="text-success">
                        ${{ number_format($producto->precio,2,',','.') }}
                    </h4>

                    <p>
                        Stock:
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

        <div class="col-12 text-center">

            <div class="alert alert-warning">

                No hay productos cargados
                en esta categoría.

            </div>

        </div>

        @endforelse

    </div>

</div>

@endsection