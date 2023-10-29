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
    <h1>Vendas</h1>
    <table class="mt-3 table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Filme</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor</th>
                <th scope="col">Usuário</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
                <tr>
                    <th scope="row">#</th>
                    <td>{{ $venda->filme->title }}</td>
                    <td>{{ $venda->amount }}</td>
                    <td>{{ $venda->amount * $venda->filme->price }}</td>
                    <td>{{ $venda->user->name }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@include('Filme.Components.footer')
