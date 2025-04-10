<!-- Add this to your <head> section to include Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Your styled navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand {{ request()->is('dashboard') ? 'fw-bold' : '' }}" href="/dashboard">Jukebox</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('playlists*') ? 'fw-bold active' : '' }}" href="/playlists">Playlists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('songs*') ? 'fw-bold active' : '' }}" href="/songs">Songs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('genres*') ? 'fw-bold active' : '' }}" href="/genres">Genres</a>
                    </li>
                </ul>
    
                <!-- Right side of navbar: Profile dropdown -->
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('profile') ? 'fw-bold' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                    @guest
                        <!-- Optionally, add a login link if user is not logged in -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'fw-bold' : '' }}" href="/login">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Include Bootstrap JavaScript (for dropdown functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    