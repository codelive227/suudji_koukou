<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container-fluid">

        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/suudji.jpg') }}" height="42" class="me-2">
            <span class="fw-bold text-success">SUUDJ KOUKU</span>
        </a>

        <!-- BOUTON MOBILE -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="menu">

            <!-- Liens principaux -->
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold text-success' : '' }}" href="{{ route('home') }}">
                        Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services') ? 'active fw-bold text-success' : '' }}" href="{{ route('services') }}">
                        Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active fw-bold text-success' : '' }}" href="{{ route('contact') }}">
                        Contact
                    </a>
                </li>
            </ul>

            <!-- Zone Auth -->
            <ul class="navbar-nav ms-3 align-items-center">

                {{-- Utilisateur non connecté --}}
                @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-outline-success rounded-pill px-3">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Connexion
                    </a>
                </li>
                @endguest

                {{-- Utilisateur connecté --}}
                @auth
                <li class="nav-item dropdown">
                    <!-- Avatar + Nom -->
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <div class="avatar-sm me-2">
                            <div class="avatar-title bg-success text-white rounded-circle">
                                <i class="bi bi-person-fill"></i>
                            </div>
                        </div>
                        <span class="fw-semibold">{{ Auth::user()->name }}</span>
                    </a>

                    <!-- Menu déroulant -->
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-person me-2 text-success"></i> Profil
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <button type="button" id="logout-btn" class="dropdown-item py-2 text-danger bg-transparent border-0 w-100 text-start">
                                    <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

<style>
.avatar-sm { width: 32px; height: 32px; }
.avatar-title { display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; }
.navbar-brand img { transition: transform 0.3s ease; }
.navbar-brand:hover img { transform: scale(1.08); }
</style>

{{-- SweetAlert2 pour la déconnexion --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('logout-btn')?.addEventListener('click', function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Voulez-vous vraiment vous déconnecter ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, me déconnecter',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    });
});
</script>
