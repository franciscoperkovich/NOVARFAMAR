@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

@if(session('error'))

<div class="alert alert-danger">

    {{ session('error') }}

</div>

@endif

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="container mt-5">

    <h2 class="mb-4">
        Usuarios Registrados
    </h2>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Fecha Registro</th>
                        <th>Estado</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($usuarios as $usuario)

                    <tr>

                        <td>{{ $usuario->id }}</td>

                        <td>{{ $usuario->name }}</td>

                        <td>{{ $usuario->email }}</td>

                        <td>

                            @if($usuario->rol == 'superadmin')

                                <span class="badge bg-dark">
                                    Super Admin
                                </span>

                            @elseif($usuario->rol == 'admin')

                                <span class="badge bg-danger">
                                    Administrador
                                </span>

                            @else

                                <span class="badge bg-primary">
                                    Cliente
                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $usuario->created_at->format('d/m/Y') }}

                        </td>

                        <td>

                            @if($usuario->activo)

                                <span class="badge bg-success">
                                    Activo
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    Inactivo
                                </span>

                            @endif

                        </td>

                        <td>

                            {{-- SI EL USUARIO YA ESTÁ INACTIVO NO MOSTRAR NINGÚN BOTÓN --}}
                            @if(!$usuario->activo)

                                <span class="text-muted">
                                    —
                                </span>

                            @else

                                {{-- SUPERADMIN --}}
                                @if(auth()->user()->rol == 'superadmin')

                                    @if($usuario->id != auth()->id())

                                        <form
                                            action="/admin/usuarios/{{ $usuario->id }}/baja"
                                            method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Desactivar usuario?')">

                                                Dar de baja

                                            </button>

                                        </form>

                                    @else

                                        <span class="text-muted">
                                            Tu cuenta
                                        </span>

                                    @endif

                                {{-- ADMIN --}}
                                @elseif(auth()->user()->rol == 'admin')

                                    @if($usuario->rol == 'cliente')

                                        <form
                                            action="/admin/usuarios/{{ $usuario->id }}/baja"
                                            method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Desactivar usuario?')">

                                                Dar de baja

                                            </button>

                                        </form>

                                    @else

                                        <span class="text-muted">
                                            Sin permisos
                                        </span>

                                    @endif

                                @endif

                            @endif

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection