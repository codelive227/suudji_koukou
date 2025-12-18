<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Footer toujours en bas */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1; /* prend tout l'espace disponible pour pousser le footer en bas */
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Contenu -->
    <main class="mt-5">
        @yield('content')
    </main>

    <!-- Footer identique partout -->
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
