<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Cliente - NovaFarmar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h2 class="mb-0">Área de Clientes</h2>
            </div>
            <div class="card-body">
                <h4>¡Bienvenido a tu cuenta de NovaFarmar!</h4>
                <p>Desde acá vas a poder ver el catálogo de medicamentos, armar tu carrito de compras y revisar tus pedidos realizados.</p>
                <hr>
                <p class=<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Cliente - NovaFarmar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="/">NovaFarmar</a>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="text-white">Hola, {{ Auth::user()->name }}</span>
                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">

        {{-- BIENVENIDA --}}
        <div class="card shadow mb-4">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-person-circle"></i> Mi cuenta</h4>
            </div>
            <div class="card-body">
                <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Rol:</strong> <span class="badge bg-info">Cliente</span></p>
            </div>
        </div>

        {{-- ACCESOS RÁPIDOS --}}
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-capsule fs-1 text-success"></i>
                        <h5 class="mt-2">Catálogo</h5>"text-muted">Esta vista es exclusiva para usuarios compradores.</p>
            </div>
        </div>
    </div>
</body>
</html>