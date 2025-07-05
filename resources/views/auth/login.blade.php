@extends('layouts.app')

@section('title', 'Login')

@section('content')
  <div class="w-full max-w-sm sm:max-w-md mx-auto flex flex-col items-center justify-center min-h-[60vh]">
    
    {{-- Logo central (opcional, caso deseje manter no conteúdo) --}}
    <div class="mb-2">
      <img src="{{ asset('images/logo.png') }}" alt="MAC Lanches Logo" class="h-22 mx-auto">
    </div>

    {{-- Formulário de login --}}
    <form method="POST" action="{{ route('login') }}" class="w-full space-y-6">
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
                 class="w-full bg-white border-b-2 border-[#371C15] py-2 px-3 pr-12 outline-none placeholder-[#371C15]/60">
          <span class="absolute inset-y-0 right-3 flex items-center text-[#371C15]">
           
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
          </span>
        </div>
      </div>

      {{-- Botões --}}
      <div class="flex flex-col items-center gap-4 pt-4 w-full">
        <button type="submit"
                class="w-full bg-[#F29C00] text-white font-semibold py-2 rounded-md shadow hover:bg-[#e68a00] transition">
          LOGIN
        </button>
        <a href="{{ route('register') }}"
           class="w-full bg-[#F29C00] text-white font-semibold py-2 rounded-md shadow hover:bg-[#d4ae6f] transition text-center">
          CADASTRE-SE
        </a>
      </div>
    </form>
  </div>
@endsection
