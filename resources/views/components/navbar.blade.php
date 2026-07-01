<nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-4">

    <div class="container-fluid">

        <a class="navbar-brand" href="/">NovaFarmar</a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarContenido">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarContenido">

            <form class="d-flex mx-auto my-3 my-lg-0 w-100 w-lg-50">

                <input
                    id="buscadorProductos"
                    class="form-control"
                    type="search"
                    placeholder="Buscar productos...">

            </form>

            <ul class="navbar-nav ms-auto align-items-lg-center gap-2">

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle text-white"
                       href="#"
                       data-bs-toggle="dropdown">

                        Categorías

                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item" href="/categoria1">
                                Medicamentos
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/categoria2">
                                Cuidado Personal
                            </a>
                        </li>

                    </ul>

                </li>

                @auth

                    <li class="nav-item">

                        <span class="navbar-text text-white fw-bold me-2">

                            ¡Hola, {{ auth()->user()->name }}!

                            @if(auth()->user()->rol == 'superadmin')

                                <span class="badge bg-dark ms-1">
                                    Super Admin
                                </span>

                            @elseif(auth()->user()->rol == 'admin')

                                <span class="badge bg-danger ms-1">
                                    Admin
                                </span>

                            @else

                                <span class="badge bg-primary ms-1">
                                    Cliente
                                </span>

                            @endif

                        </span>

                    </li>

                    @if(
                        auth()->user()->rol == 'admin' ||
                        auth()->user()->rol == 'superadmin'
                    )

                        <li class="nav-item">

                            <a href="/admin/dashboard"
                               class="btn btn-danger text-white fw-bold">

                                Panel Admin

                            </a>

                        </li>

                    @endif

                    <li class="nav-item">

                        <a href="/cliente/dashboard"
                           class="btn btn-light me-2">

                            <i class="bi bi-person-circle"></i>

                        </a>

                    </li>

                    <li class="nav-item">

                        <form action="/logout"
                              method="POST"
                              class="d-inline">

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-outline-light">

                                Cerrar Sesión

                            </button>

                        </form>

                    </li>

                @else

                    <li class="nav-item">

                        <a href="/login"
                           class="btn btn-light">

                            Ingresar

                        </a>

                    </li>

                @endauth

                <li class="nav-item">

                    <a href="/acercaNosotros"
                       class="btn btn-light">

                        Sobre Nosotros

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/contacto"
                       class="btn btn-light">

                        Contacto

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('carrito.index') }}"
                       class="btn btn-light position-relative">

                        <i class="bi bi-cart"></i>

                        @if($cantidadCarrito > 0)

                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                                {{ $cantidadCarrito }}

                            </span>

                        @endif

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>