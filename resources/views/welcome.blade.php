@include('Filme.Components.header')

<div class="container d-flex justify-content-center">
    <div class="row">

        <form action="{{ route('list.film') }}" method="GET">
            <div class=".col-sm-6">
                <input type="search" placeholder="Pesquisa titulo" name="search" class="form-control">
                <button class="btn btn-primary">Filtrar</button>
            </div>
        </form>
    </div>
</div>

<p>
<h1>Listando filmes</h1>
</p>
<div class="container d-flex justify-content-center ">
    @foreach ($filmes as $filme)
        <div class="card .col-sm-6" style="width: 18rem; margin-left: 15px; margin-right: 15px">
            <img class="card-img-top" src="images/{{ $filme->image }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $filme->title }}</h5>
                <p class="card-text">{{ $filme->description }}</p>
                <a href="{{ route('show.film', $filme->id) }}" class="btn btn-primary">Ver mais</a>
            </div>
        </div>
    @endforeach
</div>
@include('Filme.Components.footer')
