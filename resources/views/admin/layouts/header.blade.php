<nav class="navbar">
    <div class="navbar-left">
        <a href="#" class="navbar-brand" style="padding-left: 1rem !important;">KaryaVahak ERP</a>
        <button id="toggleSidebar" title="Toggle Sidebar">
            <span class="material-icons">menu</span>
        </button>
    </div>
    <div class="d-flex align-items-center" style="padding-right: 1rem !important;">

        <!-- Notifications Dropdown -->
        <div class="dropdown me-4">
            <a class="text-reset dropdown-toggle hidden-arrow" href="#" id="notifDropdown" role="button"
                data-mdb-toggle="dropdown" aria-expanded="false">
                <i class="material-icons">notifications</i>
                <span class="badge rounded-pill badge-notification bg-danger">3</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notifDropdown">
                <li><a class="dropdown-item" href="#">New message from John</a></li>
                <li><a class="dropdown-item" href="#">Server alert</a></li>
                <li><a class="dropdown-item" href="#">Meeting at 3PM</a></li>
            </ul>
        </div>

        <!-- Profile Dropdown -->
        <div class="dropdown">
            <a class="text-reset dropdown-toggle hidden-arrow" href="#" id="profileDropdown" role="button"
                data-mdb-toggle="dropdown" aria-expanded="false">
                @if (session()->has('name'))
                    <p style="font-size: 1.2rem; padding-top: 1rem !important;"><strong>{{ session('name') }}</strong>
                    </p>
                @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="{{ route('company.profile') }}">My Profile</a></li>
                <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>

    </div>
</nav>
