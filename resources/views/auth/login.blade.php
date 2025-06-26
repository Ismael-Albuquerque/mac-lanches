<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - MAC LANCHES</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FFFDF9] font-MyFont text-[#371C15] antialiased min-h-screen flex flex-col">

  {{-- Header --}}
  <header class="py-6 px-6 flex items-center justify-between">
    <button class="text-[#F29C00] focus:outline-none">
      <svg width="32" height="32" fill="none" stroke="#F29C00" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </header>

  {{-- Conteúdo principal --}}
  <main class="flex-1 flex flex-col items-center justify-center px-6">
    
    {{-- Logo central --}}
    <div class="mb-10">
      <img src="{{ asset('images/logo.png') }}" alt="MAC Lanches Logo" class="h-32 mx-auto">
    </div>

    {{-- Formulário --}}
    <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm space-y-6">
      @csrf

      {{-- Campo Email --}}
      <div>
        <label for="email" class="block text-sm font-medium mb-1">Email</label>
        <input type="email" name="email" id="email" placeholder="Digite seu email"
               class="w-full bg-white border-b-2 border-[#371C15] py-2 px-3 outline-none placeholder-[#371C15]/60">
      </div>

      {{-- Campo Senha --}}
      <div>
        <label for="password" class="block text-sm font-medium mb-1">Senha</label>
        <div class="relative">
          <input type="password" name="password" id="password" placeholder="********"
                 class="w-full bg-white border-b-2 border-[#371C15] py-2 px-3 pr-10 outline-none placeholder-[#371C15]/60">
          <span class="absolute inset-y-0 right-3 flex items-center text-[#371C15]">
            {{-- Ícone de olho (não funcional aqui, só visual) --}}
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
          </span>
        </div>
      </div>

      {{-- Botões --}}
      <div class="flex flex-col items-center space-y-4 pt-4">
        <button type="submit"
                class="bg-[#F29C00] text-white font-semibold py-2 px-8 rounded-md hover:bg-yellow-500 transition">
          LOGIN
        </button>
        <a href="{{ route('register') }}"
           class="bg-[#E6C186] text-white font-semibold py-2 px-8 rounded-md hover:bg-[#d4ae6f] transition">
          CADASTRE-SE
        </a>
      </div>

    </form>
  </main>

</body>
</html>
