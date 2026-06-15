@extends('layouts.app')

@section('title', 'Contacto')

@section('content')

@if(session('success'))
<div class="container mt-3">
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
</div>
@endif

<div class="container mt-5 mb-5">

    <h2 class="text-center fw-bold mb-4">
        Contacto
    </h2>

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-lg border-0">

                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">
                        Envíanos un mensaje
                    </h4>
                </div>

                <div class="card-body">

                    <form method="POST"
                          action="{{ route('consultas.guardar') }}">

                        @csrf

                        <input
                            type="text"
                            name="nombre"
                            class="form-control mb-3"
                            placeholder="Nombre"
                            required>

                        <input
                            type="email"
                            name="email"
                            class="form-control mb-3"
                            placeholder="Email"
                            required>

                        <input
                            type="text"
                            name="asunto"
                            class="form-control mb-3"
                            placeholder="Asunto"
                            required>

                        <textarea
                            name="mensaje"
                            class="form-control mb-3"
                            rows="4"
                            placeholder="Escribí tu mensaje..."
                            required></textarea>

                        <button
                            type="submit"
                            class="btn btn-success w-100">

                            Enviar mensaje

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- MAPA -->

    <div class="mt-5">

        <h3 class="text-center fw-bold mb-3">
            📍 Visitános
        </h3>

        <div class="rounded shadow overflow-hidden">

            <iframe
                src="https://www.google.com/maps?q=Corrientes+Argentina&output=embed"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>

        </div>

    </div>

</div>

@endsection