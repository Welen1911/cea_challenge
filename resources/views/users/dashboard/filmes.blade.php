@extends('Filme.layout.template')

@section('title', 'Vendas')

@section('header')
    @include('users.header')
@endsection

@section('content')
    @include('Filme.Components.messages')
    <br>

    @if (auth()->user()->tipo_conta == 'admin')
        <div class="container d-flex justify-content-center mt-2">
            <h1>Filmes disponiveis</h1>

        </div>
        @if (count($filmesDis) == 0)
            <br>
            <p>Não tem filmes disponiveis!</p>
            <br>
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
            <br>
        @endif
        <div class="container d-flex justify-content-center mt-2">
            <br>
            <h1>Filmes indisponiveis</h1>
            <br>
        </div>
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
            <br>

        @endif
        <div class="container d-flex justify-content-center mt-2">
            <h1>Filmes com empaces</h1>
        </div>
        @if (count($filmesDeleted) == 0)
            <p>Não tem filmes disponiveis!</p>
        @else
            <p>
                *Os filmes que são mostrados abaixo precisam de confirmação para de fato serem excluidos, visto que os
                mesmos constam na tabela de vendas, ao clicar em deletar você também excluirá as vendas relacionas a esse filme.
            </p>
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
                    @foreach ($filmesDeleted as $filme)
                        <tr>
                            <th scope="row">#</th>
                            <td>{{ $filme->title }}</td>
                            <td>{{ $filme->amount }}</td>
                            <td>{{ $filme->price }}</td>
                            <td>
                                @auth
                                    <form action="{{ route('restore.film', $filme->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-primary">Restaurar</button>
                                    </form>

                                    <form action="{{ route('destroyPerma.film', $filme->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Deletar</button>
                                    </form>
                                @endauth
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        @endif
    @endif
@endsection
