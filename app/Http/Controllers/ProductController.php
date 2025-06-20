<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Importe o Model Product, mesmo que não o usemos para buscar do DB AGORA

class ProductController extends Controller
{
    public function index()
    {
        // Por enquanto, vamos mockar alguns produtos para exibir na tela.
        // Na Sprint 2, buscaremos do banco de dados usando: $products = Product::all();
        $products = [
            (object)['id' => 1, 'name' => 'X-Bacon', 'description' => 'Delicioso hambúrguer com bacon crocante.', 'price' => 25.00, 'image_path' => null],
            (object)['id' => 2, 'name' => 'Batata Frita G', 'description' => 'Porção grande de batatas fritas.', 'price' => 12.50, 'image_path' => null],
            (object)['id' => 3, 'name' => 'Coca-Cola Lata', 'description' => 'Refrigerante lata 350ml.', 'price' => 7.00, 'image_path' => null],
        ];

        return view('products.index', compact('products'));
    }

    // Método para mostrar detalhes de um produto - usaremos na view do cardápio
    public function show(Product $product)
    {
        // Por agora, apenas retorna a view. Quando tivermos dados reais, passaremos o $product do DB.
        return view('products.show', compact('product'));
    }
}
