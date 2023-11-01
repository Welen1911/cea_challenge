@extends('Filme.layout.template')

@section('title', 'Index - Filmes')

@section('header')
@include('Filme.Components.header')
@endsection

@section('content')

@include('Filme.Components.messages')
<p>
    <h1>Listando filmes</h1>
</p>
<div class="container d-flex justify-content-center">


    @php
        $espaco = '3';
        if (count($filmes) < 3) {
            $espaco = '6';
        } elseif (count($filmes) == 3) {
            $espaco = '4';
        }
    @endphp
    <div class="row">
        @if (count($filmes) == 0)
            <p>A lista de filmes disponiveis está vazia!</p>
        @else
            @foreach ($filmes as $filme)
                <div class="col-sm-{{ $espaco }}">
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
        @endif
    </div>
</div>
@endsection
