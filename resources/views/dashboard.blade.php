@include('Filme.Components.header')
<h1>Filmes disponiveis</h1>
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
        @foreach ($filmesDisp as $filme)
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
<h1>Filmes indisponiveis</h1>
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
</table>

@include('Filme.Components.footer')
<x-app-layout>
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
</x-app-layout>
