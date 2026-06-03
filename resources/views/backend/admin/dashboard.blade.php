<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - NovaFarmar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">NovaFarmar | Panel de Control</span>
            <span class="badge bg-danger text-uppercase p-2">Rol: Administrador</span>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow border-danger">
                    <div class="card-header bg-danger text-white">
                        <h3 class="mb-0">Bienvenido al Panel de Administración</h3>
                    </div>
                    <div class="card-body text-center py-5">
                        <h4 class="card-title text-secondary">Gestión Central de Farmacias y Medicamentos</h4>
                        <p class="card-text mt-3 text-muted">
                            Desde este panel exclusivo vas a poder administrar las sucursales, controlar el stock de medicamentos de las categorías 1, 2 y 3, y dar de alta nuevos productos en el sistema.
                        </p>
                        <hr class="my-4">
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-outline-danger m-1" type="button">Gestionar Sucursales</button>
                            <button class="btn btn-outline-dark m-1" type="button">Ver Listado de Productos</button>
                            <button class="btn btn-outline-secondary m-1" type="button">Control de Stock</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>