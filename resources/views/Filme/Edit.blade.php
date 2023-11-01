@extends('Filme.layout.template')

@section('title', 'Editar ' . $filme->title)

@section('header')
    @include('users.header')
@endsection

@section('content')
    @include('Filme.Components.errors')
    <div class="container d-flex justify-content-center mt-2">
        <h1>Editar</h1>
    </div>
    <div class="col-md-6 offset-md-3">
        <form class="form-control" action="{{ route('update.film', $filme->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @include('Filme.Components.form', ['filme' => $filme])
        </form>
    </div>
@endsection
