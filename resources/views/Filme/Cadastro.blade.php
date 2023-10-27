<h1>cadastro de filme</h1>

<form action="{{ route('create.filmStore') }}" method="post" enctype="multipart/form-data">
    @include('Filme.Components.form')
</form>
