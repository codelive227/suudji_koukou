<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mon App' }}</title>

      @vite('resources/css/app.css')

        @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optionnel: votre CSS personnalisé -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex">

        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <h3 class="mb-4">Mon Logo</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="#">Accueil</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Profil</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Paramètres</a></li>
            </ul>
        </div>

        <!-- Contenu principal -->
        <div class="flex-grow-1 p-4">
            {{ $slot }}
        </div>
    </div>

    <!-- Bootstrap JS (optionnel) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
     