@if (session('msg'))
    <div class="alert alert-primary d-flex justify-content-center" role="alert">
        {{ session('msg') }}
    </div>
@endif
