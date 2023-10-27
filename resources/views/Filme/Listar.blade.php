@include('Filme.Components.header')
<h1>Listando filmes</h1>
<div class="container d-flex justify-content-center">
    @foreach ($filmes as $filme)
    <div class="card col" style="width: 18rem; margin-left: 15px; margin-right: 15px">
        <img class="card-img-top" src='{{ asset("storage/images/$filme->image") }}' alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $filme->title }}</h5>
          <p class="card-text">{{ $filme->description }}</p>
          <a href="{{ route('show.film', $filme->id) }}" class="btn btn-primary">Ver mais</a>
        </div>
      </div>
    @endforeach
</div>
