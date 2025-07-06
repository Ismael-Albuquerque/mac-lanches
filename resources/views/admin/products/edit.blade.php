@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 text-[#371C15]">
    <h1 class="text-2xl font-bold mb-6">Editar Produto</h1>

    {{-- Mensagens de erro --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('admin.products.update', $product) }}"
          enctype="multipart/form-data"
          class="space-y-6 max-w-md">
        @csrf
        @method('PUT')

        {{-- Nome --}}
        <input type="text"
               name="name"
               value="{{ old('name', $product->name) }}"
               class="w-full border rounded px-4 py-2"
               placeholder="Nome do produto"
               required>

        {{-- Descrição --}}
        <textarea name="description"
                  rows="4"
                  class="w-full border rounded px-4 py-2"
                  placeholder="Descrição">{{ old('description', $product->description) }}</textarea>

        {{-- Preço --}}
        <input type="number"
               name="price"
               step="0.01"
               value="{{ old('price', $product->price) }}"
               class="w-full border rounded px-4 py-2"
               placeholder="Preço"
               required>

        {{-- Imagem atual --}}
        @if ($product->image_path)
            <div>
                <p class="text-sm mb-1">Imagem atual:</p>
                <img src="{{ asset('storage/' . $product->image_path) }}"
                     alt="Imagem do produto"
                     class="w-32 h-32 object-cover mb-2 rounded border">
            </div>
        @endif

        {{-- Upload de nova imagem --}}
        <input type="file" name="image" accept="image/*" class="w-full">

        {{-- Disponibilidade --}}
        <label class="flex items-center space-x-2">
            <input type="hidden" name="is_available" value="0">
            <input type="checkbox"
                   name="is_available"
                   value="1"
                   {{ old('is_available', $product->is_available) == 1 ? 'checked' : '' }}>
            <span>Disponível para venda</span>
        </label>

        {{-- Ações --}}
        <div class="flex space-x-4">
            <button type="submit"
                    class="bg-[#F29C00] text-white font-semibold px-6 py-2 rounded hover:bg-yellow-500 transition">
                Atualizar
            </button>
            <a href="{{ route('admin.products.index') }}" class="text-sm underline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
