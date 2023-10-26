<h1>Titulo:</h1>
<p>{{ $filme->title }}</p>
<h2>ID:</h2>
<p>{{ $filme->id }}</p>

<form action="{{ route('delete.film', $filme->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button>Deletar</button>
</form>
