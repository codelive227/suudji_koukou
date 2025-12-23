<div class="sidebar vh-100 p-3" style="width:260px">

    {{-- TITRE --}}
    <div class="mb-4 text-center">
        <h5 class="fw-bold mb-0" style="color:#198754">SUUDJ KOUKU</h5>
        <small class="text-muted">Hadj & Omra</small>
    </div>

    <ul class="nav flex-column gap-1">

        {{-- DASHBOARD --}}
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center
                {{ request()->routeIs('dashboard') ? 'active' : '' }}"
               href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2 me-2 text-warning"></i>
                Tableau de bord
            </a>
        </li>

        {{-- PELERINS --}}
        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center
                {{ request()->routeIs('pelerins*') ? 'active' : '' }}"
               data-bs-toggle="collapse"
               href="#menuPelerins"
               aria-expanded="{{ request()->routeIs('pelerins*') ? 'true' : 'false' }}">
                <span>
                    <i class="bi bi-people me-2 text-success"></i>
                    Pèlerins
                </span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <div class="collapse {{ request()->routeIs('pelerins*') ? 'show' : '' }}"
                 id="menuPelerins">
                <ul class="nav flex-column ms-3 mt-1">
                    <li class="nav-item">
                        <a class="nav-link sub-link
                            {{ request()->routeIs('pelerins.index') ? 'active' : '' }}"
                           href="{{ route('pelerins.index') }}">
                            Liste des pèlerins
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link sub-link" href="{{ route('pelerins.create') }}">
                            Ajouter un pèlerin
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- VOYAGES --}}
        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center"
               data-bs-toggle="collapse"
               href="#menuVoyages">
                <span>
                    <i class="bi bi-airplane me-2 text-primary"></i>
                    Voyages
                </span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <div class="collapse" id="menuVoyages">
                <ul class="nav flex-column ms-3 mt-1">
                    <li class="nav-item">
                        <a class="nav-link sub-link" href="#">Programmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link sub-link" href="#">Groupes</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- PAIEMENTS --}}
        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center"
               data-bs-toggle="collapse"
               href="#menuPaiements">
                <span>
                    <i class="bi bi-cash-stack me-2 text-warning"></i>
                    Paiements
                </span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <div class="collapse" id="menuPaiements">
                <ul class="nav flex-column ms-3 mt-1">
                    <li class="nav-item">
                        <a class="nav-link sub-link" href="#">Encaissements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link sub-link" href="#">Dépenses</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- UTILISATEURS --}}
        <li class="nav-item mt-2">
            <a class="nav-link" href="#">
                <i class="bi bi-person-gear me-2 text-dark"></i>
                Utilisateurs
            </a>
        </li>

    </ul>
</div>
