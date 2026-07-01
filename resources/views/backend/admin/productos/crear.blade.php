<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>

        Crear Producto - NovaFarmar

    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-4">

    <div class="container-fluid">

        <a
            class="navbar-brand"
            href="/admin/dashboard">

            <i class="bi bi-house-door"></i>

            NovaFarmar | Panel Admin

        </a>

        <form
            action="/logout"
            method="POST">

            @csrf

            <button
                class="btn btn-outline-light btn-sm">

                <i class="bi bi-box-arrow-right"></i>

                Cerrar Sesión

            </button>

        </form>

    </div>

</nav>

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h4 class="mb-0">

                <i class="bi bi-plus-circle"></i>

                Nuevo Producto

            </h4>

        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form
                action="/admin/productos"
                method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Nombre

                    </label>

                    <input
                        type="text"
                        name="nombre"
                        class="form-control"
                        value="{{ old('nombre') }}"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Descripción

                    </label>

                    <textarea
                        name="descripcion"
                        rows="4"
                        class="form-control"
                        required>{{ old('descripcion') }}</textarea>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <label class="form-label">

                            Precio

                        </label>

                        <input
                            type="number"
                            name="precio"
                            class="form-control"
                            min="0"
                            step="0.01"
                            value="{{ old('precio') }}"
                            required>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">

                            Stock

                        </label>

                        <input
                            type="number"
                            name="stock"
                            class="form-control"
                            min="0"
                            value="{{ old('stock') }}"
                            required>

                    </div>

                </div>

                <div class="mt-3">

                    <label class="form-label">

                        URL de Imagen

                    </label>

                    <input
                        type="url"
                        name="url_imagen"
                        class="form-control"
                        value="{{ old('url_imagen') }}">

                </div>

                <div class="mt-3">

                    <label class="form-label">

                        Categoría

                    </label>

                    <select
                        name="tipo"
                        class="form-select">

                        <option value="medicamento">

                            Medicamento

                        </option>

                        <option value="cuidado_personal">

                            Cuidado Personal

                        </option>

                    </select>

                </div>

                <hr>

                <button
                    type="submit"
                    class="btn btn-success">

                    <i class="bi bi-save"></i>

                    Guardar Producto

                </button>

                <a
                    href="/admin/productos"
                    class="btn btn-secondary">

                    Cancelar

                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>