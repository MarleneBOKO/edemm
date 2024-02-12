<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <!-- Navbar ou en-tête -->
    <nav>
        <!-- Insérez votre code de navigation ici -->
    </nav>

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer ou pied de page -->
    <footer>
        <!-- Insérez votre code de pied de page ici -->
    </footer>
</body>
</html>
