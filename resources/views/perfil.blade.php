@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-success text-white">

                    <h4 class="mb-0">
                        <i class="bi bi-person-circle"></i>
                        Mi Perfil
                    </h4>

                </div>

                <div class="card-body">

                    @if(session('success'))

                        <div class="alert alert-success">

                            {{ session('success') }}

                        </div>

                    @endif

                    <form method="POST"
                          action="{{ route('perfil.actualizar') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Nombre
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ auth()->user()->name }}"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Correo Electrónico
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                value="{{ auth()->user()->email }}"
                                disabled>

                        </div>

                        <hr>

                        <h5>Cambiar Contraseña</h5>

                        <div class="mb-3">

                            <label class="form-label">
                                Nueva Contraseña
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Confirmar Contraseña
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control">

                        </div>

                        <button
                            type="submit"
                            class="btn btn-success w-100">

                            Guardar Cambios

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection