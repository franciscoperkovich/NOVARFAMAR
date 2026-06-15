@extends('layouts.app')

@section('title', 'Medicamentos')

@section('content')

@if(session('error'))

<div class="container mt-3">

    <div class="alert alert-danger">

        {{ session('error') }}

    </div>

</div>

@endif

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
                <img src="{{ asset('img/productos/medicamentos/portada8.png') }}"
                     class="d-block w-100">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/productos/medicamentos/portada9.png') }}"
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

        <div class="col-md-4 mb-4 producto-card-busqueda">

            <div
    class="card h-100 shadow-sm border-0 product-card text-center p-4"
    data-nombre="{{ strtolower($producto->nombre) }}"
    data-descripcion="{{ strtolower($producto->descripcion) }}">

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

                    <!--<p>
                        Stock disponible:
                        {{ $producto->stock }}
                    </p> -->

                    @auth

                    <form action="{{ route('carrito.agregar', $producto->id) }}"
      method="POST">

    @csrf

    <input type="hidden"
           name="cantidad"
           value="1"
           class="cantidad-input">

    <div class="d-flex justify-content-center align-items-center gap-2 mb-3">

        <button type="button"
                class="btn btn-outline-danger btn-restar">
            -
        </button>

        <span class="cantidad-text fw-bold">1</span>

        <button type="button"
                class="btn btn-outline-success btn-sumar"
                data-stock="{{ $producto->stock }}">
            +
        </button>

    </div>

    <button class="btn btn-success w-100">

        <i class="bi bi-cart-plus"></i>
        Agregar al carrito

    </button>

</form>

                    @else

                    <a href="/login"
                       class="btn btn-outline-success">

                        Iniciar sesión

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

@section('scripts')

<script>

document.querySelectorAll('.btn-sumar').forEach(function(boton){

    boton.addEventListener('click', function(){

        let stock = parseInt(this.dataset.stock);

        let form = this.closest('form');

        let input = form.querySelector('.cantidad-input');

        let texto = form.querySelector('.cantidad-text');

        let cantidad = parseInt(input.value);

        if(cantidad >= stock){

            alert(
                'No hay más stock disponible. Máximo: '
                + stock
            );

            return;
        }

        cantidad++;

        input.value = cantidad;

        texto.textContent = cantidad;

    });

});


document.querySelectorAll('.btn-restar').forEach(function(boton){

    boton.addEventListener('click', function(){

        let form = this.closest('form');

        let input = form.querySelector('.cantidad-input');

        let texto = form.querySelector('.cantidad-text');

        let cantidad = parseInt(input.value);

        if(cantidad > 1){

            cantidad--;

            input.value = cantidad;

            texto.textContent = cantidad;

        }

    });

});

</script>

@endsection

@endsection