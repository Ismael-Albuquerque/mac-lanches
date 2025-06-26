@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8">
    @foreach($products as $product)
      <div class="flex flex-col items-center text-center space-y-2">
        <a href="{{ route('products.show', $product) }}">
          <div class="w-full h-36 bg-gray-200 rounded-md overflow-hidden">
            @if($product->image_path)
              <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="object-cover w-full h-full rounded-md" />
            @else
              <img src="{{ asset('storage/' . $product->image_path) }}" alt="Imagem do produto">
            @endif
          </div>
        </a>
        <h2 class="text-sm font-medium uppercase tracking-wide text-[#371C15]">
          {{ $product->name }}
        </h2>
        <span class="text-sm text-[#371C15]">
          R$ {{ number_format($product->price, 2, ',', '.') }}
        </span>
      </div>
    @endforeach
  </div>
@endsection
