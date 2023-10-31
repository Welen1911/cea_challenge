@include('Filme.Components.header')
<h1>cadastro de filme</h1>

<form class="form-control" action="{{ route('create.filmStore') }}" method="post" enctype="multipart/form-data">
    @include('Filme.Components.form')
</form>

@include('Filme.Components.footer')
