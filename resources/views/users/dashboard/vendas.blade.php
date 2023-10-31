@include('users.header')
<br><br>
<div class="container d-flex justify-content-center mt-2">
    <h1>Vendas</h1>
</div>
<hr>
@if (auth()->user()->tipo_conta == 'admin')
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
