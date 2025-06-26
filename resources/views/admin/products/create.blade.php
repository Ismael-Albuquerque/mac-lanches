@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 text-[#371C15]">
    <h1 class="text-2xl font-bold mb-6">Cadastrar Novo Produto</h1>

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-6 max-w-md">
        @csrf

        <input type="text" name="name" placeholder="Nome do produto" value="{{ old('name') }}"
               class="w-full border rounded px-4 py-2" required>

        <textarea name="description" placeholder="Descrição" rows="4"
                  class="w-full border rounded px-4 py-2">{{ old('description') }}</textarea>

        <input type="number" name="price" placeholder="Preço" step="0.01" value="{{ old('price') }}"
               class="w-full border rounded px-4 py-2" required>

        <input type="file" name="image" class="w-full">

        <label class="flex items-center space-x-2">
            <input type="checkbox" name="is_available" checked>
            <span>Disponível para venda</span>
        </label>

        <div class="flex space-x-4">
            <button type="submit" class="bg-[#F29C00] text-white font-semibold px-6 py-2 rounded hover:bg-yellow-500">
                Salvar
            </button>
            <a href="{{ route('admin.products.index') }}" class="text-sm underline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
