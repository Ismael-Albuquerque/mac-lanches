@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 text-[#371C15]">
    <h1 class="text-2xl font-bold mb-6">Finalizar Pedido</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if (count($cart) > 0)
        <div class="mb-4">
            <p>Total do pedido: <strong>R$ {{ number_format($subtotal, 2, ',', '.') }}</strong></p>
        </div>

        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            
            <input type="text" name="customer_phone" placeholder="Telefone" class="w-full mb-4 px-4 py-2 border rounded" required>

            <textarea name="customer_address" placeholder="Endereço de entrega" rows="3" class="w-full mb-4 px-4 py-2 border rounded" required></textarea>

            <textarea name="notes" placeholder="Observações (opcional)" rows="2" class="w-full mb-4 px-4 py-2 border rounded"></textarea>

            <button class="bg-[#F29C00] text-white px-6 py-2 rounded hover:bg-yellow-500">
                Confirmar Pedido
            </button>
        </form>
    @else
        <p>Seu carrinho está vazio.</p>
    @endif
</div>
@endsection
