<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - NovaFarmar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-dark bg-dark px-4">
        <div class="container-fluid">
            <a class="navbar-brand mb-0 h1 text-decoration-none text-white" href="/">
                <i class="bi bi-house-door"></i> NovaFarmar | Panel de Control
            </a>
            
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-danger text-uppercase p-2">Rol: Administrador</span>
                
                <form action="/logout" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                    </button>
                </form>
            </div>
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
                        <h4 class="card-title text-secondary">Gestión Centralizada (Requisitos del Proyecto)</h4>
                        <p class="card-text mt-3 text-muted">
                            Acceso exclusivo para la gestión de catálogo de medicamentos y monitoreo de interacciones de usuarios en NovaFarmar.
                        </p>
                        <hr class="my-4">
                        
                        <div class="row g-3 justify-content-center">
                            <div class="col-12 col-md-4">
                                <a href="/admin/productos" class="btn btn-outline-danger w-100 p-3 fw-bold">
                                    <i class="bi bi-capsule"></i> CRUD Productos (Altas/Bajas/Modif.)
                                </a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="/admin/usuarios" class="btn btn-outline-dark w-100 p-3 fw-bold">
                                    <i class="bi bi-people"></i> Visualizar Usuarios
                                </a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="/admin/consultas" class="btn btn-outline-secondary w-100 p-3 fw-bold">
                                    <i class="bi bi-envelope-paper"></i> Consultas y Contactos
                                </a>
                            </div>
                            <div class="col-12 col-md-4 mt-3">
                                <a href="/admin/ventas" class="btn btn-outline-success w-100 p-3 fw-bold">
                                    <i class="bi bi-cart-check"></i> Monitoreo de Ventas
                                </a>
                            </div>
                        </div>
                        
                        <div class="mt-5">
                            <a href="/" class="text-decoration-none text-secondary small">
                                <i class="bi bi-arrow-left"></i> Volver a la Tienda Pública
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>