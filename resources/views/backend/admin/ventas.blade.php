@extends('layouts.app')

@section('title', 'Ventas')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Monitoreo de Ventas</h2>

    {{-- FILTRO POR FECHA --}}
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" action="/admin/ventas" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">Desde</label>
                    <input type="date" name="desde" class="form-control" value="{{ request('desde') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Hasta</label>
                    <input type="date" name="hasta" class="form-control" value="{{ request('hasta') }}">
                </div>
                <div class="col-md-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                    <a href="/admin/ventas" class="btn btn-secondary">Limpiar</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @forelse($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->usuario->name }}</td>
                        <td>${{ number_format($venta->total, 2, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-success">{{ $venta->estado }}</span>
                        </td>
                        <td>{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="/admin/ventas/{{ $venta->id }}" class="btn btn-primary btn-sm">
                                Ver detalle
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No hay ventas en ese período.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection