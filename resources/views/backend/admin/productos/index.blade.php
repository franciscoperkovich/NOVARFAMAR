@extends('layouts.app')

@section('title', 'Gestión de Productos')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>

            Gestión de Productos

        </h2>

        <a href="/admin/productos/crear"
           class="btn btn-success">

            <i class="bi bi-plus-circle"></i>

            Nuevo Producto

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-striped table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Nombre</th>

                        <th>Precio</th>

                        <th>Stock</th>

                        <th>Estado</th>

                        <th>Tipo</th>

                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($productos as $producto)

                    <tr>

                        <td>

                            {{ $producto->id }}

                        </td>

                        <td>

                            {{ $producto->nombre }}

                        </td>

                        <td>

                            ${{ number_format($producto->precio,2,',','.') }}

                        </td>

                        <td>

                            @if($producto->stock > 0)

                                <span class="badge bg-success">

                                    {{ $producto->stock }}

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Sin Stock

                                </span>

                            @endif

                        </td>

                        <td>

                            @if($producto->activo)

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

                            @if($producto->tipo == 'medicamento')

                                <span class="badge bg-primary">

                                    Medicamento

                                </span>

                            @else

                                <span class="badge bg-info text-dark">

                                    Cuidado Personal

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="/admin/productos/{{ $producto->id }}/editar"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil"></i>

                                Editar

                            </a>

                            @if($producto->activo)

                                <form
                                    action="/admin/productos/{{ $producto->id }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Está seguro que desea eliminar este producto?')">

                                        <i class="bi bi-trash"></i>

                                        Eliminar

                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="text-center">

                            No existen productos registrados.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            <div class="d-flex justify-content-center mt-4">

                {{ $productos->links() }}

            </div>

        </div>

    </div>

</div>

@endsection