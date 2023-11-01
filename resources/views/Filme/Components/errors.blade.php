@if (count($errors))
    <div class="alert alert-danger d-flex justify-content-center" role="alert">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
