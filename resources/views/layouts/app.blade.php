<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'MAC LANCHES')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FFFDF9] font-MyFont text-[#371C15] antialiased flex flex-col min-h-screen">

  {{-- Header / Navegação --}}
  <header class="bg-[#FFFDF9] py-6">
    <div class="container mx-auto px-6 flex justify-between items-center">
      <div class="flex items-center space-x-4">
        <button class="text-[#F29C00] focus:outline-none">
          <svg width="50" height="50" fill="none" stroke="#F29C00" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
        <div class="flex items-center space-x-2">
          <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="MAC LANCHES Logo" class="h-20 w-auto" />
          </a>
        </div>
      </div>

      {{-- Botões de login/logout --}}
      <div>
        @guest
          {{-- Mostrar botão ENTRAR apenas em rotas públicas --}}
          @if(request()->routeIs('home') || request()->routeIs('products.*') || request()->routeIs('welcome'))
            <a href="{{ route('login') }}" class="bg-[#F29C00] hover:bg-yellow-500 text-white font-semibold py-2 px-6 rounded-md transition duration-300">
              ENTRAR
            </a>
          @endif
        @endguest

        @auth
          {{-- Botão SAIR --}}
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-semibold py-2 px-6 rounded-md transition duration-300">
              SAIR
            </button>
          </form>
        @endauth
      </div>
    </div>
  </header>

  {{-- Conteúdo principal --}}
  <main class="container mx-auto px-6 py-12 flex-grow">
    @yield('content')
  </main>

  {{-- Rodapé --}}
  <footer class="bg-[#FFFDF9] text-[#371C15] py-8 mt-auto">
    <div class="container mx-auto px-6 flex justify-between items-start text-sm">
      <div class="flex items-center space-x-2">
        <img src="{{ asset('images/logo.png') }}" alt="MAC LANCHES Logo" class="h-20 w-auto" />
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