<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes y Pedidos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">
            <i class="fas fa-cube"></i>
            Gestión Pro
        </div>
        <div class="nav-links">
            <a href="{{ route('clients.index') }}">
                <i class="fas fa-users"></i> Clientes
            </a>
            <a href="{{ route('orders.index') }}">
                <i class="fas fa-shopping-cart"></i> Pedidos
            </a>
        </div>
    </nav>

    <!-- Contenedor Principal -->
    <div class="container">
        <!-- Alertas -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <div>
                    <strong>Por favor, corrige los errores:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Contenido de la página -->
        @yield('content')
    </div>
</body>
</html>
