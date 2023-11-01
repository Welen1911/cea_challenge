@extends('Filme.layout.template')

@section('title', $filme->title)

@section('header')
@include('Filme.Components.header')
@endsection

@section('content')

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-5"><img class="card-img-top mb-5 mb-md-0" src="/images/{{ $filme->image }}" alt="..." />
            </div>
            <div class="col-md-6">
                <span>Quantidade: {{ $filme->amount }}</span>
                <h1 class="display-5 fw-bolder">{{ $filme->title }}</h1>
                <div class="fs-5 mb-5">
                    <span>R${{ $filme->price }}</span>
                </div>
                <p class="lead">{{ $filme->description }}</p>
                <div class="d-flex">
                    @auth
                        @if (auth()->user()->tipo_conta != 'admin')
                            <form action="{{ route('buy.film', $filme->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input class="text-center me-3" type="num" value="1" style="max-width: 3rem"
                                    name="amount" />
                                <button class="btn btn-primary flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Comprar
                                </button>
                            </form>
                        @else
                            <form action="{{ route('delete.film', $filme->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Deletar</button>
                            </form>
                        @endif
                    @endauth
                    @guest
                        <form action="{{ route('buy.film', $filme->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input class="text-center me-3" type="num" value="1" style="max-width: 3rem"
                                name="amount" />
                            <button class="btn btn-primary flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Comprar
                            </button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</section>
<div style="padding: 15px"></div>
@endsection
