@include('users.header')

<h1>Criar categoria</h1>


<form class="form-control" action="{{ route('store.category') }}" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="">Categoria</label>
        <input type="text" class="form-control" id="" placeholder="ex: Espacial" name="name">
    </div>
    <button type="submit" class="btn btn-dark">Submit</button>
</form>
