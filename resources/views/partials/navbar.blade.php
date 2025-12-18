<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center text-success" href="{{ route('home') }}">
            <img src="{{ asset('images/suudji.jpg') }}" height="42" class="me-2">
            SUUDJ KOUKU
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto fw-semibold align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('home') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('services') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a href="{{ route('gestion') }}" class="btn btn-warning fw-semibold rounded-pill px-4">
                        Espace Admin
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
