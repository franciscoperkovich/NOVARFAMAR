@extends('layouts.app')

@section('title', 'Mi Cuenta')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">

        Mi Cuenta

    </h2>

    <div class="row">

        <div class="col-md-4">

            <div class="card shadow-sm">

                <div class="card-body text-center">

                    <i class="bi bi-person-circle fs-1"></i>

                    <h5 class="mt-2">

                        {{ auth()->user()->name }}

                    </h5>

                    <p>

                        {{ auth()->user()->email }}

                    </p>

                            <a href="/perfil"
           class="btn btn-primary">

            Editar Datos

        </a>

                </div>

            </div>

        </div>

        <div class="col-md-8">

            <div class="card shadow-sm">

                <div class="card-header">

                    Acciones

                </div>

                <div class="card-body">

                    <a href="{{ route('miscompras') }}"
                       class="btn btn-success">

                        Mis Compras

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection