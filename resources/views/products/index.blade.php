<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAC LANCHES</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FFFDF9] font-MyFont text-[#371C15] antialiased">

  {{-- Header / Navegação --}}
  <header class="bg-[#FFFDF9] py-6">
    <div class="container mx-auto px-6 flex justify-between items-center">

      
      <div class="flex items-center space-x-4">

        {{-- Ícone menu --}}
        <button class="text-[#F29C00] focus:outline-none ">
          <svg width="50" height="50" fill="none" stroke="#F29C00" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>

        {{-- Logo --}}
        <div class="flex items-center space-x-2">
          <img src="{{ asset('images/logo.png') }}" alt="MAC LANCHES Logo" class="h-30 w-30">
        </div>
      </div>

      {{-- Botão Entrar --}}
      <a href="#"
         class="bg-[#F29C00] hover:bg-yellow-500 text-white font-semibold py-2 px-6 rounded-md transition duration-300">
        ENTRAR
      </a>
    </div>
  </header>

  {{-- Navegação --}}
  <nav class="hidden lg:flex ml-30 space-x-16 text-lg font-medium tracking-wide px-6 mt-4">
    <a href="{{ route('products.index') }}" class="hover:text-[#F29C00] transition">CARDÁPIO</a>
    <a href="#" class="hover:text-[#F29C00] transition">PROMOÇÕES</a>
  </nav>

  {{-- Produtos place holder --}}
  <main class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8">
      @foreach($products as $product)
        <div class="flex flex-col items-center text-center space-y-2">

          {{-- Imagem --}}
          <div class="w-full h-36 bg-gray-200 rounded-md">
            @if($product->image_path)
              <img src="{{ asset('storage/' . $product->image_path) }}"
                   alt="{{ $product->name }}"
                   class="object-cover w-full h-full rounded-md">
            @else
              <img src="{{ asset('images/batata.jpg') }}"
                   alt="Placeholder"
                   class="object-cover w-full h-full rounded-md">
            @endif
          </div>

          {{-- Nome --}}
          <h2 class="text-sm font-medium uppercase tracking-wide text-[#371C15]">
            {{ $product->name }}
          </h2>

          {{-- Preço --}}
          <span class="text-sm text-[#371C15]">
            R$ {{ number_format($product->price, 2, ',', '.') }}
          </span>
        </div>
      @endforeach
    </div>
  </main>

  {{-- Rodapé --}}
  <footer class="bg-[#FFFDF9] text-[#371C15] py-8 mt-12">
    <div class="container mx-auto px-6 flex justify-between items-start text-sm">

      <div class="flex items-center space-x-2">
        <img src="{{ asset('images/logo.png') }}" alt="MAC LANCHES Logo" class="h-40 w-auto">
      </div>

      <div class="flex flex-col items-end text-right space-y-1">
        <p class="font-semibold">CONTATO</p>
        <p>+XX XXX XXXX-XXXX</p>
        <p class="font-semibold mt-2">ENDEREÇO</p>
        <p>RUA DE BAIXO, XXX, BAIRRO, CIDADE - PR</p>
      </div>

    </div>
  </footer>

</body>
</html>
