<form method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    <label>Nome</label>
    <input name="name" value="{{ old('name', $product->name ?? '') }}" required>

    <label>Preço</label>
    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price ?? '') }}" required>

    <label>Descrição</label>
    <textarea name="description">{{ old('description', $product->description ?? '') }}</textarea>

    <label>
        <input type="checkbox" name="is_available" {{ old('is_available', $product->is_available ?? true) ? 'checked' : '' }}>
        Disponível
    </label>

    <button type="submit">Salvar</button>
</form>
