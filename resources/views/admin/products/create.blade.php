@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 text-[#371C15]">
    <h1 class="text-2xl font-bold mb-6">Cadastrar Novo Produto</h1>

    {{-- Mensagem de sucesso --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mensagens de erro --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-6 max-w-md">
        @csrf

        <input type="text" name="name" placeholder="Nome do produto"
               value="{{ old('name') }}"
               class="w-full border rounded px-4 py-2" required>

        <textarea name="description" placeholder="Descrição" rows="4"
                  class="w-full border rounded px-4 py-2">{{ old('description') }}</textarea>

        <input type="number" name="price" placeholder="Preço" step="0.01"
               value="{{ old('price') }}"
               class="w-full border rounded px-4 py-2" required>

        <input type="file" name="image" accept="image/png, image/jpeg"
               class="w-full">

        <label class="flex items-center space-x-2">
            <input type="hidden" name="is_available" value="0">
            <input type="checkbox" name="is_available" value="1"
                   {{ old('is_available', true) == 1 ? 'checked' : '' }}>
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
