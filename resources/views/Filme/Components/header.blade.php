<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
    <div class="container-xl">
        <!-- Logo -->
        <span class="navbar-brand" href="#">
            Filmes
        </span>
        <!-- Navbar toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Nav -->
            <div class="navbar-nav mx-lg-auto">
                <a class="nav-item nav-link active" href="{{ route('list.film') }}" aria-current="page">Home</a>
                <a class="nav-item nav-link" href="/dashboard" aria-current="page">Dashboard</a>
            </div>
            <div class="navbar-nav mx-lg-auto">
                <form action="{{ route('list.film') }}" method="GET">
                    <input type="search" placeholder="Pesquisa titulo" name="search" class="form-control">
            </div>
            </form>
            @guest
            <div class="navbar-nav ms-lg-4">
                <a class="nav-item nav-link" href="/login">Login</a>
            </div>
            <!-- Action -->
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
                <a href="/register" class="btn btn-sm btn-primary w-full w-lg-auto">
                    Registra-se
                </a>
            </div>
        @endguest
        @auth
            <!-- Action -->
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/user/profile">Perfil</a></li>
                        <li>
                            <form action="/logout" method="POST" style="margin-left: 5px">
                                @csrf
                                <button class="btn border-none">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endauth
        </div>

        <!-- Right navigation -->

    </div>
    </div>
</nav>
