    @csrf
    <input type="text" placeholder="Título" name="title" value="{{ $filme->title ?? old('title') }}">
    <textarea name="description" id="" cols="30" rows="10" placeholder="Descrição">{{ $filme->description ?? old('description') }}</textarea>
    <input type="number" placeholder="QTD" name="amount" value="{{ $filme->amount ?? old('amount') }}">
    <input type="number" placeholder="Preço" name="price" value="{{ $filme->price ?? old('price') }}">
    <button>Enviar</button>
