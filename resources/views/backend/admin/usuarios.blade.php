@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

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

                    </tr>

                </thead>

                <tbody>

                @foreach($usuarios as $usuario)

                    <tr>

                        <td>{{ $usuario->id }}</td>

                        <td>{{ $usuario->name }}</td>

                        <td>{{ $usuario->email }}</td>

                        <td>

                            @if($usuario->rol == 'admin')

                                <span class="badge bg-danger">
                                    Admin
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

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection