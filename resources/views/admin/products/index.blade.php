@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#FFFDF9] text-[#371C15] px-8 py-10">
    <div class="max-w-4xl mx-auto">

        @if(session('success'))
        
    <div class="bg-[#DFF5D2] text-[#256029] border border-[#A4D6A0] px-4 py-2 rounded mb-6 font-medium">
    {{ session('success') }}
</div>
@endif

        <h1 class="text-xl font-semibold mb-6">PRODUTOS CADASTRADOS</h1>

        <a href="{{ route('admin.products.create') }}"
           class="bg-[#F29C00] text-white font-semibold px-6 py-2 rounded-md shadow hover:bg-[#e88c00] transition mb-8 inline-block">
            + NOVO PRODUTO
        </a>

        <div class="space-y-4">
            @forelse($products as $product)
                <div class="bg-[#FEE3AC] rounded-lg p-4 flex justify-between items-center">
                    <div class="flex flex-col">
    <span class="text-lg font-medium">{{ $product->name }}</span>

    @unless($product->is_available)
        <span class="text-sm text-red-600 font-semibold">Indisponível para venda</span>
    @endunless
</div>

                    <div class="flex space-x-2">
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="bg-[#F29C00] p-2 rounded shadow hover:bg-[#d98100] flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-5.586-9.414a2 2 0 112.828 2.828L11 13l-4 1 1-4 6.414-6.414z"/>
                            </svg>
                        </a>

                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                              onsubmit="return confirm('Deseja excluir este produto?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-600 p-2 rounded shadow hover:bg-red-700 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Nenhum produto cadastrado ainda.</p>
            @endforelse
        </div>

    </div>
</div>
@endsection
