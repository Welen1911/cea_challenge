@extends('Filme.layout.template')

@section('title', 'Vendas')

@section('header')
    @include('users.header')
@endsection

@section('content')
    @include('Filme.Components.messages')
<br>

@if (auth()->user()->tipo_conta != 'admin')
    <div class="container d-flex justify-content-center mt-2">
        <h1>Seus filmes</h1>
    </div>
    @if (count($filmes) == 0)
    <br>
    <p>Você ainda não comprou filmes!</p>
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
    <br>
@endif
@endsection
