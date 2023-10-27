@include('Filme.Components.header')
<h1>Listando filmes</h1>
<div class="container d-flex justify-content-center">
    @foreach ($filmes as $filme)
    <div class="card col" style="width: 18rem; margin-left: 15px; margin-right: 15px">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    @endforeach
</div>
