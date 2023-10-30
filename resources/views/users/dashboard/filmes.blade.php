@include('users.header')
<br>
<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-sm-6">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title">Alguns filmes estão sem estoque!!!</h5>
                    <p class="card-text">Altere a quantidade em estoque para continuar vendendo</p>
                    <a href="{{ route('create.film') }}" class="btn btn-primary">Ver filmes</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Criar novas categorias</h5>
                    <p class="card-text">Crie uma categoria de filme que ainda não está listado em nossos sistemas!</p>
                    <a href="{{ route('create.category') }}" class="btn btn-dark">Criar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@if (auth()->user()->tipo_conta == 'admin')
    <h1>Filmes disponiveis</h1>
    @if (count($filmesDis) == 0)
        <p>Não tem filmes disponiveis!</p>
    @else
        <table class="mt-3 table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filmesDis as $filme)
                    <tr>
                        <th scope="row">#</th>
                        <td>{{ $filme->title }}</td>
                        <td>{{ $filme->amount }}</td>
                        <td>{{ $filme->price }}</td>
                        <td>
                            @auth
                                <a href="{{ route('edit.film', $filme->id) }}" class="btn btn-primary">Editar</a>
                            @endauth
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <h1>Filmes indisponiveis</h1>
    @if (count($filmesIndis) == 0)
        <p>Não tem filmes sem estoque!</p>
    @else
        <table class="mt-3 table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filmesIndis as $filme)
                    <tr>
                        <th scope="row">#</th>
                        <td>{{ $filme->title }}</td>
                        <td>{{ $filme->amount }}</td>
                        <td>{{ $filme->price }}</td>
                        <td>
                            @auth
                                <a href="{{ route('edit.film', $filme->id) }}" class="btn btn-primary">Editar</a>
                            @endauth
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@else
    <h1>Seus filmes</h1>
    <table class="mt-3 table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filmes as $filme)
                <tr>
                    <th scope="row">#</th>
                    <td>{{ $filme->title }}</td>
                    <td>{{ $filme->amount }}</td>
                    <td>{{ $filme->price }}</td>
                    <td>
                        @auth
                            <form action="{{ route('devolution.film', $filme->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Devolver</button>
                            </form>
                        @endauth
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@include('Filme.Components.footer')
