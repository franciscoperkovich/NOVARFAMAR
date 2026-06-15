@extends('layouts.app')

@section('title', 'Consultas y Contactos')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">

        Consultas y Contactos

    </h2>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Asunto</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>

                    </tr>

                </thead>

                <tbody>

@foreach($consultas as $consulta)

<tr>

    <td>{{ $consulta->nombre }}</td>

    <td>{{ $consulta->email }}</td>

    <td>{{ $consulta->asunto }}</td>

    <td>{{ $consulta->mensaje }}</td>

    <td>
        {{ $consulta->created_at->format('d/m/Y H:i') }}
    </td>

    <td>

        @if($consulta->leida)

            <span class="badge bg-success">
                Leída
            </span>

        @else

            <span class="badge bg-warning text-dark">
                Pendiente
            </span>

        @endif

    </td>

    <td>

        @if(!$consulta->leida)

            <form action="/admin/consultas/{{ $consulta->id }}/leer"
                  method="POST">

                @csrf
                @method('PUT')

                <button class="btn btn-success btn-sm">
                    Marcar como leída
                </button>

            </form>

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