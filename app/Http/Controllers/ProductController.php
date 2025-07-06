<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Página pública do cardápio
    public function index()
    {
        $products = Product::where('is_available', true)->get();
        return view('index', compact('products'));
    }

    // Detalhes de um produto
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Página administrativa - listagem
    public function adminIndex()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Formulário para criar produto
    public function create()
    {
        return view('admin.products.create');
    }

    // Armazena um novo produto
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            // 'is_available' não validado porque vem como string '0' ou '1'
        ]);

        // Pega o valor enviado pelo formulário, padrão 0
        $data['is_available'] = $request->input('is_available', 0);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produto criado com sucesso!');
    }

    // Formulário para editar produto
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Atualiza o produto
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            // 'is_available' removido da validação
        ]);

        // Pega valor da checkbox + hidden
        $data['is_available'] = $request->input('is_available', 0);

        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    // Exclui produto
    public function destroy(Product $product)
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produto excluído!');
    }
}
