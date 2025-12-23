<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Agence Suudj Kouku')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (CORRIGÉ) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Livewire -->
    @livewireStyles

    <!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Thème personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    <style>
        /* Espace pour la navbar fixed */
        body {
            padding-top: 56px;
        }

        .main-wrapper {
            min-height: calc(100vh - 56px - 60px);
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    {{-- ================= NAVBAR ================= --}}
    @include('partials.navbar')

    {{-- ================= CONTENU ================= --}}
    <div class="container-fluid flex-fill p-0">
        <div class="row g-0">

            @auth
                {{-- Afficher sidebar seulement si no-sidebar n’est PAS défini --}}
                @if(!View::hasSection('no-sidebar'))
                    <nav class="col-md-3 col-lg-2 d-md-block bg-white shadow-sm border-end">
                        @include('partials.sidebar')
                    </nav>

                    <main class="col-md-9 ms-sm-auto col-lg-10 p-4">
                        @yield('content')
                    </main>
                @else
                    <main class="col-12">
                        @yield('content')
                    </main>
                @endif
            @else
                {{-- Visiteurs --}}
                <main class="col-12">
                    @yield('content')
                </main>
            @endauth

        </div>
    </div>

    {{-- ================= FOOTER ================= --}}
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        © {{ date('Y') }} Agence Suudj Kouku – Hadj & Omra. Tous droits réservés.
    </footer>

    <!-- ================= SCRIPTS ================= -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Livewire -->
    @livewireScripts

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ================= SWEETALERT FLASH ================= -->

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: "{{ session('success') }}",
            confirmButtonColor: '#198754'
        });
    </script>
    @endif

    @if($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erreur',
            text: "{{ $errors->first() }}",
            confirmButtonColor: '#dc3545'
        });
    </script>
    @endif

</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    title: 'Succès !',
    text: "{{ session('success') }}",
    icon: 'success',
    confirmButtonColor: '#28a745'
});
</script>
@endif

@if($errors->any())
<script>
Swal.fire({
    title: 'Erreur !',
    text: "{{ $errors->first() }}",
    icon: 'error',
    confirmButtonColor: '#d33'
});
</script>
@endif

</html>
