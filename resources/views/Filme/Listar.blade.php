<h1>Listando filmes</h1>

@foreach ($filmes as $filme)
    <h2>{{ $filme->title }}</h2>
    <a href="{{ route('show.film', $filme->id) }}">Ver mais</a>
    <a href="{{ route('edit.film', $filme->id) }}">Editar</a>
@endforeach
