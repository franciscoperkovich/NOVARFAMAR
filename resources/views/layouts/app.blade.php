<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">

    <x-navbar />

    <div class="flex-grow-1">
        @yield('content')
    </div>

    <footer class="bg-dark text-white mt-auto pt-4 pb-3">
        <div class="container">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold">Farmacia</h5>
                    <p class="small">
                        Tu salud es nuestra prioridad. Atención 24hs con productos de calidad.
                    </p>
                </div>

                <div class="col-md-4 mb-3">
                    <h6 class="fw-bold">Enlaces</h6>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-white text-decoration-none">Inicio</a></li>
                        
                        @guest
                            <li><a href="/login" class="text-white text-decoration-none">Ingresar</a></li>
                        @endguest
                        
                        <li><a href="/contacto" class="text-white text-decoration-none">Contacto</a></li>
                        <li><a href="/terminos" class="text-white text-decoration-none">Términos y Condiciones</a></li>
                    </ul>
                </div>

                <div class="col-md-4 mb-3">
                    <h6 class="fw-bold">Seguinos</h6>
                    <div class="d-flex gap-3 mt-2">
                        <a href="https://instagram.com/" target="_blank" class="text-white fs-4 social-icon">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://facebook.com" target="_blank" class="text-white fs-4 social-icon">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </div>
                </div>

            </div>

            <hr class="border-light">

            <div class="text-center small">
                © {{ date('Y') }} Farmacia - Todos los derechos reservados
            </div>

        </div>
    </footer>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')
</body>
</html>