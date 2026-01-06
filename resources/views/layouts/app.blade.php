<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Control de Egresados UES')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Meta responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        :root {
            --umb-green: #0B6B3A;
            --umb-green-soft: #e6f2ec;
        }

        .bg-umb {
            background-color: var(--umb-green) !important;
        }

        .text-umb {
            color: var(--umb-green) !important;
        }

        .btn-umb {
            background-color: var(--umb-green);
            color: #fff;
            border: none;
        }

        .btn-umb:hover {
            background-color: #095c32;
            color: #fff;
        }

        .card-umb {
            border-left: 5px solid var(--umb-green);
        }

        .table-umb thead {
            background-color: var(--umb-green);
            color: #fff;
        }

        .badge-umb {
            background-color: var(--umb-green);
        }

        /* Navbar refinado */
        .navbar-umb {
            background-color: var(--umb-green);
        }

        .navbar-umb .nav-link {
            color: #ffffffcc;
            font-weight: 500;
        }

        .navbar-umb .nav-link:hover {
            color: #fff;
        }

        .navbar-brand {
            font-weight: 600;
            letter-spacing: .5px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-umb shadow-sm">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <!-- Aquí luego puedes meter el logo -->
                <span>UES San José del Rincón</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            Iniciar sesión
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <!-- CONTENIDO -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-light text-center text-muted py-3 mt-5">
        <div class="container">
            <small>
                © {{ date('Y') }} UES San José del Rincón | Sistema de Seguimiento de Egresados
            </small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
