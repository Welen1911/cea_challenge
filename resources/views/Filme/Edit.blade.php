<h1>Editar</h1>


<form action="{{ route('update.film', $filme->id) }}" method="post">
    @method('PUT')
    @include('Filme.Components.form', ['filme' => $filme])
</form>
