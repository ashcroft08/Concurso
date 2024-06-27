<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administrador</title>
    <link rel="icon" href="{{ asset('img/gidac-icono2.ico') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <ul class="menu">
                <!-- Agrega aquí los elementos de la barra lateral -->
                <li class="active">
                    <a href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-gauge-high"></i>
                        <span>INICIO</span>
                    </a>
                </li>

                <li class="dropdown__list">
                    <a href="{{ route('indexPapelera') }}" class="dropdown__link">
                        <i class="fa-solid fa-trash"></i>
                        <span>GESTIÓN DE RESERVAS</span>
                    </a>
                </li>

                <li class="dropdown__list">
                    <a href="{{ route('indexPapelera') }}" class="dropdown__link">
                        <i class="fa-solid fa-trash"></i>
                        <span>rEPORTES</span>
                    </a>
                </li>

                <li class="dropdown__list">
                    <a class="dropdown__link">
                        <i class="fa-solid fa-user"></i>
                        <span class="dropdown__span">{{ Auth::user()->name }}</span>
                        <img src="{{ asset('img/down.svg') }}" class="dropdown__arrow">

                        <input type="checkbox" class="dropdown__check">
                    </a>

                    <div class="dropdown__content">

                        <ul class="dropdown__sub">

                            <li class="dropdown__li">
                                <a href="{{ route('profile.edit') }}" class="dropdown__anchor">Perfil</a>
                            </li>
                            <li class="dropdown__li">
                                <a href="{{ route('logout') }}" class="dropdown__anchor"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="main--content">
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Main content -->
            <div class="container-fluid">
                @yield('contenido')
            </div><!-- /.container-fluid -->
            <!-- /.content -->
        </div>
    </div>
    <!-- Mensaje de éxito -->
</body>

</html>
