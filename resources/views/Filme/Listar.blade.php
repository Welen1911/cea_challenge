@include('Filme.Components.header')
<p><h1>Listando filmes</h1></p>
<div class="container d-flex justify-content-center ">
    @foreach ($filmes as $filme)
        <div class="card .col-sm-6" style="width: 18rem; margin-left: 15px; margin-right: 15px">
            <img class="card-img-top" src="images/{{ $filme->image }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $filme->title }}</h5>
                <p class="card-text">{{ $filme->description }}</p>
                <a href="{{ route('show.film', $filme->id) }}" class="btn btn-primary">Ver mais</a>
                <a href="{{ route('edit.film', $filme->id) }}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    @endforeach
</div>
@foreach ($categorias as $categoria)
    <p><h1>{{ $categoria->name }}</h1></p>
    <div class="container d-flex justify-content-center ">
        @foreach ($filmes as $filme)
            @if ($filme->categoria == $categoria->id)
                <div class="card .col-sm-6" style="width: 18rem; margin-left: 15px; margin-right: 15px">
                    <img class="card-img-top" src="images/{{ $filme->image }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $filme->title }}</h5>
                        <p class="card-text">{{ $filme->description }}</p>
                        <a href="{{ route('show.film', $filme->id) }}" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endforeach
