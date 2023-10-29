@include('Filme.Components.header')

<p>
<h1>Listando filmes</h1>
</p>
<div class="container d-flex justify-content-center ">
    @foreach ($filmes as $filme)
        <div class="card .col-sm-6" style="width: 18rem; margin-left: 15px; margin-right: 15px">
            <img class="card-img-top" src="images/{{ $filme->image }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $filme->title }}</h5>
                <p class="card-text">{{ $filme->categoria }}</p>
                <a href="{{ route('show.film', $filme->id) }}" class="btn btn-primary">Ver mais</a>
            </div>
        </div>
    @endforeach
</div>
@include('Filme.Components.footer')
