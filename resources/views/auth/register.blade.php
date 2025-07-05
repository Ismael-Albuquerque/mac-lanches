@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')
  <div class="w-full max-w-sm sm:max-w-md mx-auto flex flex-col items-center justify-center min-h-[60vh]">

    {{-- Logo --}}
    <div class="mb-8">
      <img src="{{ asset('images/logo.png') }}" alt="MAC Lanches Logo" class="h-32 mx-auto">
    </div>

    {{-- Mensagens de erro --}}
    @if ($errors->any())
      <div class="mb-6 p-4 text-sm text-red-700 bg-red-100 border border-red-300 rounded space-y-1 w-full">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif

    {{-- Formulário de cadastro --}}
    <form method="POST" action="{{ route('register') }}" class="w-full space-y-6">
      @csrf

      {{-- Nome --}}
      <div>
        <label for="name" class="block text-sm font-medium mb-1">Nome completo</label>
        <input type="text" name="name" id="name" placeholder="Digite seu nome"
               value="{{ old('name') }}"
               class="w-full bg-white border-b-2 border-[#371C15] py-2 px-3 outline-none placeholder-[#371C15]/60">
      </div>

      {{-- Email --}}
      <div>
        <label for="email" class="block text-sm font-medium mb-1">Email</label>
        <input type="email" name="email" id="email" placeholder="Digite seu email"
               value="{{ old('email') }}"
               class="w-full bg-white border-b-2 border-[#371C15] py-2 px-3 outline-none placeholder-[#371C15]/60">
      </div>

      {{-- Senha --}}
      <div>
        <label for="password" class="block text-sm font-medium mb-1">Senha</label>
        <input type="password" name="password" id="password" placeholder="********"
               class="w-full bg-white border-b-2 border-[#371C15] py-2 px-3 outline-none placeholder-[#371C15]/60">
      </div>

      {{-- Confirmar senha --}}
      <div>
        <label for="password_confirmation" class="block text-sm font-medium mb-1">Confirmar Senha</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********"
               class="w-full bg-white border-b-2 border-[#371C15] py-2 px-3 outline-none placeholder-[#371C15]/60">
      </div>

      {{-- Botões --}}
      <div class="flex flex-col items-center gap-4 pt-4 w-full">
        <button type="submit"
                class="w-full bg-[#F29C00] text-white font-semibold py-2 rounded-md shadow hover:bg-[#e68a00] transition">
          CRIAR
        </button>
        <a href="{{ route('login') }}"
           class="w-full bg-[#F29C00] text-white font-semibold py-2 rounded-md shadow hover:bg-[#d4ae6f] transition text-center">
          CANCELAR
        </a>
      </div>
    </form>
  </div>
@endsection
