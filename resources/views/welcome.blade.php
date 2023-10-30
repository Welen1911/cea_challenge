@include('Filme.Components.header')
@if (session('msg'))
    <div class="alert alert-primary d-flex justify-content-center" role="alert">
        {{ session('msg') }}
    </div>
@endif
<p>
<h1>Listando filmes</h1>
</p>
<div class="container d-flex justify-content-center">
    <div class="row">
        @foreach ($filmes as $filme)
            <div class="col-sm-{{ count($filmes) < 3 ? '6' : '3' }}">
                <div class="card" style="width: 18rem; margin-left: 10px; margin-right: 10px; margin-bottom: 10px;">
                    <img class="card-img-top" src="images/{{ $filme->image }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $filme->title }}</h5>
                        <p class="card-text">{{ $filme->categoria }}</p>
                        <a href="{{ route('show.film', $filme->id) }}" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@include('Filme.Components.footer')
