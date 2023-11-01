@extends('Filme.layout.template')

@section('title', 'Cadastrar filme')

@section('header')
@include('users.header')
@endsection

@section('content')
<h1>cadastro de filme</h1>

<div class="col-md-6 offset-md-3">
    <form class="form-control" action="{{ route('create.filmStore') }}" method="post" enctype="multipart/form-data">
        @include('Filme.Components.form')
    </form>
</div>
@endsection
