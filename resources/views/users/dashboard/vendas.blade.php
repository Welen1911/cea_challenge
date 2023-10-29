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
    {{-- <h1>Filmes indisponiveis</h1>
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
            @foreach ($filmesInd as $filme)
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
    </table> --}}
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
                            <a href="" class="btn btn-danger">Devolver</a>
                        @endauth
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@include('Filme.Components.footer')
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
