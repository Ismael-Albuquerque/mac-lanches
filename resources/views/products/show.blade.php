<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Detalhes</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="container mx-auto p-6">
        <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline mb-4 inline-block">&larr; Voltar ao Cardápio</a>

        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
            <p class="text-gray-700 text-lg mb-6">{{ $product->description }}</p>
            <span class="text-green-600 font-bold text-3xl">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
            <button class="mt-8 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full text-lg transition duration-300">
                Adicionar ao Carrinho
            </button>
        </div>
    </div>
</body>
</html>