@extends('layouts.app')

@section('title', 'Nuestro Equipo - NovaFarmar')

@section('content')

<div class="container mt-5 mb-5">

    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-success">Nuestro Equipo</h1>
        <p class="lead text-muted">Estudiantes de Sistemas de la UNNE dedicados al desarrollo de soluciones tecnológicas.</p>
        <hr class="mx-auto w-25 border-success border-2">
    </div>

    <div class="row g-4 justify-content-center">

        <div class="col-md-5">
            <div class="card team-card shadow-sm p-4 h-100 text-center">
                <div class="mb-3">
                    <img src="{{ asset('img/nosotros/20230228_101632.jpg') }}" 
                         class="rounded-circle profile-img shadow-sm">
                </div>
                
                <h4 class="fw-bold mb-1">V. Román Lopez Machado</h4>
                <div class="role-badge text-primary mb-3">Desarrollo Backend</div>
                
                <p class="text-muted small">
                    Estudiante de la Licenciatura en Sistemas. Responsable de la arquitectura del servidor, gestión de base de datos y la implementación de activos estáticos para optimizar la portabilidad del sistema.
                </p>

                <div class="mt-auto pt-3">
                    <a href="https://instagram.com/romanlopm" target="_blank" class="btn btn-outline-primary w-100">
                        <i class="bi bi-instagram"></i> Instagram
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card team-card shadow-sm p-4 h-100 text-center">
                <div class="mb-3">
                    <img src="{{ asset('img/nosotros/Captura de pantalla (5).png') }}" 
                         class="rounded-circle profile-img shadow-sm">
                </div>

                <h4 class="fw-bold mb-1">Francisco Gomez Perkovich</h4>
                <div class="role-badge text-success mb-3">Desarrollo Frontend</div>

                <p class="text-muted small">
                    Estudiante de la Licenciatura en Sistemas. Encargado del diseño de interfaz, maquetación responsiva con Bootstrap y la experiencia de usuario mediante el motor de plantillas Blade.
                </p>

                <div class="mt-auto pt-3">
                    <a href="https://instagram.com/franperkovich_" target="_blank" class="btn btn-outline-success w-100">
                        <i class="bi bi-instagram"></i> Instagram
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection