@include('Filme.Components.header')

<h1>Editar</h1>
<form class="form-control" action="{{ route('update.film', $filme->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @include('Filme.Components.form', ['filme' => $filme])
</form>
@include('Filme.Components.footer')
