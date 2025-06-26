<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Página pública do cardápio (view raiz: resources/views/index.blade.php)
    public function index()
{
    $products = Product::where('is_available', true)->get();
    return view('index', compact('products'));
}

    // Detalhes de um produto (view: resources/views/products/show.blade.php)
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Página administrativa - listagem (view: resources/views/admin/products/index.blade.php)
    public function adminIndex()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'is_available' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('products', 'public');
        }

        $data['is_available'] = $request->has('is_available');

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'is_available' => 'nullable|boolean',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data['is_available'] = $request->has('is_available');

    // Se uma nova imagem for enviada
    if ($request->hasFile('image')) {
        // Apaga a imagem anterior se existir
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        // Salva a nova imagem
        $imagePath = $request->file('image')->store('products', 'public');
        $data['image_path'] = $imagePath;
    }

    $product->update($data);

    return redirect()->route('admin.products.index')
                     ->with('success', 'Produto atualizado com sucesso!');
}

    public function destroy(Product $product)
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produto excluído!');
    }
}

