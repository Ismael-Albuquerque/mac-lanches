@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 text-[#371C15]">
    <h1 class="text-2xl font-bold mb-6">Seu Carrinho</h1>

    @if (count($cart) > 0)
        <table class="w-full text-left mb-6">
            <thead>
                <tr>
                    <th class="pb-2">Produto</th>
                    <th class="pb-2">Preço</th>
                    <th class="pb-2">Quantidade</th>
                    <th class="pb-2">Subtotal</th>
                    <th class="pb-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $productId => $item)
                    <tr>
                        <td class="py-2">{{ $item['name'] }}</td>
                        <td class="py-2">R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                        <td class="py-2">
                            <form action="{{ route('cart.update', $productId) }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{ $item['quantity'] }}"
                                    min="1"
                                    class="w-16 border rounded px-2 py-1"
                                    required
                                />
                                <button type="submit" class="bg-[#F29C00] text-white px-3 py-1 rounded hover:bg-blue-600">
                                    Atualizar
                                </button>
                            </form>
                        </td>
                        <td class="py-2">R$ {{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</td>
                        <td class="py-2">
                            <form action="{{ route('cart.remove', $productId) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Remover
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right font-bold text-lg mb-6">
            Total: R$ {{ number_format($subtotal, 2, ',', '.') }}
        </div>

        <div class="mt-6 flex justify-between">
            <a href="{{ route('home') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-400">
                Continuar Comprando
            </a>

            <a href="{{ route('checkout.index') }}" class="bg-[#F29C00] text-white px-6 py-2 rounded hover:bg-yellow-500">
                Finalizar Pedido
            </a>
        </div>
    @else
        <p class="text-gray-600">Seu carrinho está vazio.</p>
    @endif
</div>
@endsection
