@extends('layouts.app')

@section('title', 'Bienvenido a NovaFarmar - Tu Farmacia en Corrientes')

@section('content')

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
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 product-card text-center p-4">
                <div class="mb-3">
                    <img src="https://cdn-icons-png.flaticon.com/512/2966/2966489.png" class="producto-img">
                </div>
                <h5 class="fw-bold">Ibuprofeno 600mg</h5>
                <p class="text-muted small">Caja x 20 cápsulas blandas</p>
                <p class="fs-4 fw-bold text-success">$2.500</p>
                <button class="btn btn-success w-100 mt-2 shadow-sm">
                    <i class="bi bi-cart-plus"></i> Agregar
                </button>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 product-card text-center p-4">
                <div class="mb-3">
                    <img src="https://cdn-icons-png.flaticon.com/512/2913/2913465.png" class="producto-img">
                </div>
                <h5 class="fw-bold">Alcohol en Gel</h5>
                <p class="text-muted small">Envase con dosificador 500ml</p>
                <p class="fs-4 fw-bold text-success">$1.800</p>
                <button class="btn btn-success w-100 mt-2 shadow-sm">
                    <i class="bi bi-cart-plus"></i> Agregar
                </button>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 product-card text-center p-4">
                <div class="mb-3">
                    <img src="https://cdn-icons-png.flaticon.com/512/1684/1684375.png" class="producto-img">
                </div>
                <h5 class="fw-bold">Termómetro Digital</h5>
                <p class="text-muted small">Alta precisión - Punta flexible</p>
                <p class="fs-4 fw-bold text-success">$5.200</p>
                <button class="btn btn-success w-100 mt-2 shadow-sm">
                    <i class="bi bi-cart-plus"></i> Agregar
                </button>
            </div>
        </div>
    </div>
</div>

@endsection