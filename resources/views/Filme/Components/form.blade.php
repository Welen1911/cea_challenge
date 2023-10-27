    @csrf
    <div class="form-group">
        <label for="">Título</label>
        <input type="text" class="form-control" id="" placeholder="ex: Interestrelar" name="title"
            value="{{ $filme->title ?? old('title') }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Descrição</label>
        <textarea class="form-control" rows="3" name="description" placeholder="ex: interestelar é legal">{{ $filme->description ?? old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label for="">Quantidade:</label>
        <input type="number" class="form-control" id="" name="amount" placeholder="ex: 0"
            value="{{ $filme->amount ?? old('amount') }}">
    </div>
    <div class="form-group">
        <label for="">Preço:</label>
        <input type="number" class="form-control" id="" name="price" placeholder="ex: 0.00"
            value="{{ $filme->price ?? old('price') }}">
    </div>
    <div class="form-group">
        <label for="">Capa:</label>
        <input type="file" id="" name="image">
    </div>

    <button type="submit" class="btn btn-dark">Submit</button>
