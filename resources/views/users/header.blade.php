<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
    <div class="container-xl">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            Dashboard
        </a>
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
                @if (auth()->user()->tipo_conta == 'admin')
                    <a class="nav-item nav-link active" href="{{ route('dashboard') }}" aria-current="page">Vendas</a>
                    <a class="nav-item nav-link active" href="{{ route('dashboard.filmes') }}"
                        aria-current="page">Filmes</a>

                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Cadastrar
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('create.film') }}">Filme</a></li>
                            <li><a class="dropdown-item" href="{{ route('create.category') }}">Categoria</a></li>
                        </ul>
                    </div>
                @else
                    <a class="nav-item nav-link active" href="{{ route('dashboard.filmes') }}"
                        aria-current="page">Biblioteca</a>

            </div>
            @endif

        </div>

        <!-- Right navigation -->
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
    </div>
</nav>
