@extends('layouts.app')

@section('title', 'Bienvenido a NovaFarmar - Tu Farmacia en Corrientes')

@section('content')

@if(session('error'))

<div class="container mt-3">

    <div class="alert alert-danger">

        {{ session('error') }}

    </div>

</div>

@endif

<div class="container mt-5">
    
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-success">¡Hola! Bienvenido a NovaFarmar</h1>
        <p class="lead text-muted">Tu salud y bienestar, siempre en buenas manos.</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-12 col-md-6">
            <h5 class="fw-bold text-success mb-3 border-start border-4 border-success ps-2">Nuestras Sucursales</h5>
            <div id="carouselFarmacia" class="carousel slide carousel-fade shadow-sm" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1586015555751-63bb77f4322a?q=80&w=800" class="d-block w-100">
                            <div class="info-footer-farmacia bg-success">
                                <h6 class="fw-bold mb-0"><i class="bi bi-clock-history"></i> Atención 24hs</h6>
                                    <small>Av. 3 de Abril - Corrientes Capital</small>
                            </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=800" class="d-block w-100">
                        <div class="info-footer-farmacia bg-success">
                            <h6 class="fw-bold mb-0"><i class="bi bi-file-earmark-medical"></i> Recetas Digitales</h6>
                            <small>Validación inmediata de Obras Sociales</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <h5 class="fw-bold text-primary mb-3 border-start border-4 border-primary ps-2">Mundo Perfumería</h5>
            <div id="carouselPerfumeria" class="carousel slide carousel-fade shadow-sm" data-bs-ride="carousel" data-bs-interval="3500">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1594035910387-fea47794261f?q=80&w=800" class="d-block w-100">
                        <div class="info-footer-primary bg-success">
                            <h6 class="fw-bold mb-0"><i class="bi bi-stars"></i> Fragancias Seleccionadas</h6>
                            <small>Importadas y Nacionales con descuento</small>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1556228720-195a672e8a03?q=80&w=800" class="d-block w-100">
                        <div class="info-footer-primary bg-success">
                            <h6 class="fw-bold mb-0"><i class="bi bi-droplet-half"></i> Dermocosmética</h6>
                            <small>Cuidado profesional para tu piel</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mb-4">
        <h3 class="fw-bold section-title">Productos Destacados</h3>
    </div>

    <div class="row welcome-products">

    @foreach($productos as $producto)

        <div class="col-md-4 mb-4 producto-card-busqueda">

            <div
    class="card h-100 shadow-sm border-0 product-card text-center p-4"
    data-nombre="{{ strtolower($producto->nombre) }}"
    data-descripcion="{{ strtolower($producto->descripcion) }}">

                <div class="mb-3">

                    @if($producto->url_imagen)

    <img
        src="{{ $producto->url_imagen }}"
        class="producto-img">

@else

                        <img
                            src="https://cdn-icons-png.flaticon.com/512/2966/2966489.png"
                            class="producto-img">

                    @endif

                </div>

                <h5 class="fw-bold">
                    {{ $producto->nombre }}
                </h5>

                <p class="text-muted small">
                    {{ $producto->descripcion }}
                </p>

                <p class="fs-4 fw-bold text-success">
                    ${{ number_format($producto->precio, 0, ',', '.') }}
                </p>

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
                       class="btn btn-success w-100 mt-2">

                        Iniciar sesión

                    </a>

                @endauth

            </div>

        </div>

    @endforeach

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