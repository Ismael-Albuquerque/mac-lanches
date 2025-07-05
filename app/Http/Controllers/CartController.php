<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = session('cart', []);

        $subtotal = collect($cart)->reduce(function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);

        return view('cart.index', compact('cart', 'subtotal'));
    }

    public function add(Request $request)
{
    $product = Product::findOrFail($request->product_id);

    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity'] += 1;
    } else {
        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
        ];
    }

    session(['cart' => $cart]);

    return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho!');
}

public function update(Request $request, $productId)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $cart = session('cart', []);

    if (!isset($cart[$productId])) {
        return redirect()->back()->with('error', 'Produto não encontrado no carrinho.');
    }

    $cart[$productId]['quantity'] = $request->input('quantity');
    session(['cart' => $cart]);

    return redirect()->back()->with('success', 'Quantidade atualizada.');
}

public function remove(Request $request, $productId)
{
    $cart = session('cart', []);

    if (isset($cart[$productId])) {
        unset($cart[$productId]);
        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Item removido do carrinho.');
    }

    return redirect()->back()->with('error', 'Produto não encontrado no carrinho.');
}

}
