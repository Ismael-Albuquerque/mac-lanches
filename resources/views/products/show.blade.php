@extends('layouts.app')

@section('title', $product->name . ' - Detalhes')

@section('content')
<main class="flex flex-col items-center justify-center text-center px-6">
    {{-- Imagem do produto --}}
    <div class="w-64 h-64 bg-gray-300 rounded-md mb-6 overflow-hidden">
        @if($product->image_path)
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="object-cover w-full h-full rounded-md">
        @endif
    </div>

    {{-- Nome e preço --}}
    <h1 class="text-sm font-semibold uppercase tracking-wide">{{ $product->name }}</h1>
    <p class="text-sm font-medium mt-1 mb-4">R$ {{ number_format($product->price, 2, ',', '.') }}</p>

    {{-- Descrição --}}
    <p class="text-xs leading-relaxed max-w-xs text-[#371C15] mb-10">
        {{ $product->description }}
    </p>

    {{-- Botões --}}
    <div class="flex flex-col items-center space-y-4">
        <button class="bg-[#F29C00] text-white text-xs font-bold py-3 px-8 rounded-md shadow-md hover:bg-yellow-500 transition">
            ADICIONAR AO CARRINHO
        </button>

        <a href="{{ route('home') }}" class="bg-[#F29C00] text-white text-xs font-bold py-3 px-8 rounded-md shadow-md hover:bg-yellow-500 transition">
            VOLTAR
        </a>
    </div>
</main>
@endsection
