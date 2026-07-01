<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - NovaFarmar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- 📄 Sumamos los iconos de Bootstrap para la flechita de volver -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Ingreso a NovaFarmar</h4>
                    </div>
                    <div class="card-body">
                        <form action="/login" method="POST">

                            @if ($errors->any())
    <div class="alert alert-danger">

        @foreach($errors->all() as $error)

            <div>{{ $error }}</div>

        @endforeach

    </div>
@endif

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Ingresar</button>
                        </form>
                        
                        <div class="text-center mt-3">
                            <a href="/registro" class="text-decoration-none">¿No tenés cuenta? Registrate acá</a>
                        </div>

                        <!-- 🔄 SECCIÓN NUEVA: Línea divisoria y botón para volver al inicio público -->
                        <hr class="my-3 text-muted">
                        <div class="text-center">
                            <a href="/" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Volver a la Tienda
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>