<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->reduce(function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);

        return view('checkout.index', compact('cart', 'subtotal'));
    }

    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'O carrinho está vazio.');
        }

        $validated = $request->validate([
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string|max:255',
            'notes' => 'nullable|string|max:255',
        ]);

        $total = collect($cart)->reduce(function ($acc, $item) {
            return $acc + ($item['price'] * $item['quantity']);
        }, 0);

        $user = Auth::user();

        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'pendente',
            'customer_phone' => $validated['customer_phone'],
            'customer_address' => $validated['customer_address'],
            'notes' => $validated['notes'] ?? null,
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price_at_purchase' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Pedido realizado com sucesso!');
    }
}
