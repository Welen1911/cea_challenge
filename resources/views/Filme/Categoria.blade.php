@extends('Filme.layout.template')

@section('title', 'Criar categoria')

@section('header')
    @include('users.header')
@endsection

@section('content')
    @include('Filme.Components.messages')
    @include('Filme.Components.errors')
    <div class="container d-flex justify-content-center mt-2">
        <h1>Criar categoria</h1>
    </div>

    <div class="col-md-6 offset-md-3">
        <form class="form-control" action="{{ route('store.category') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for=""><b>Categoria</b></label>
                <input type="text" class="form-control" id="" placeholder="ex: Espacial" name="name">
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
@endsection
