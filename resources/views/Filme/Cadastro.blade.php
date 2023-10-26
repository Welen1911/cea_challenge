<h1>cadastro de filme</h1>

<form action="{{ route('create.filmStore') }}" method="post">
    @include('Filme.Components.form')
</form>
