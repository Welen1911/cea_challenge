    @csrf
    <div class="form-group mb-3">
        <label for=""><b>Título:</b></label>
        <input type="text" class="form-control" id="" placeholder="ex: Interestrelar" name="title"
            value="{{ $filme->title ?? old('title') }}">
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPassword1"><b>Descrição:</b></label>
        <textarea class="form-control" rows="3" name="description" placeholder="ex: interestelar é legal">{{ $filme->description ?? old('description') }}</textarea>
    </div>
    <div class="form-group mb-3">
        <label for=""><b>Quantidade:</b></label>
        <input type="number" class="form-control" id="" name="amount" placeholder="ex: 0"
            value="{{ $filme->amount ?? old('amount') }}">
    </div>
    <div class="form-group mb-3">
        <label for=""><b>Preço:</b></label>
        <input type="number" class="form-control" id="" name="price" placeholder="ex: 0.00"
            value="{{ $filme->price ?? old('price') }}">
    </div>
    <div class="form-group mb-3">
        <label for=""><b>Capa:</b></label>
        <input type="file" id="" name="image">
    </div>
    <div class="form-group mb-3">
        <label for=""><b>Categoria:</b></label>
        <select class="form-control" name="categoria">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-dark">Submit</button>
