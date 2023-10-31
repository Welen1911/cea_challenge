<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
        <div class="container-xl">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                Filmes
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
                    <a class="nav-item nav-link" href="/dashboard" aria-current="page">Dashboard</a>
                </div>
                <div class="navbar-nav mx-lg-auto">
                    <form action="{{ route('list.film') }}" method="GET">
                        <input type="search" placeholder="Pesquisa titulo" name="search" class="form-control">
                </div>
                </form>
            </div>

            <!-- Right navigation -->
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
                            <li><form action="/logout" method="POST" style="margin-left: 5px">
                                @csrf
                                <button class="btn border-none">
                                    Logout
                                </button>
                            </form></li>
                        </ul>
                    </div>
                </div>
            @endauth
        </div>
        </div>
    </nav>
</body>

</html>
