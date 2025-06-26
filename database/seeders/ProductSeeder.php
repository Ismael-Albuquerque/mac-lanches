<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'X-Bacon',
                'description' => 'Delicioso hambúrguer com bacon crocante.',
                'price' => 25.00,
                'image_path' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Batata Frita G',
                'description' => 'Porção grande de batatas fritas.',
                'price' => 12.50,
                'image_path' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coca-Cola Lata',
                'description' => 'Refrigerante lata 350ml.',
                'price' => 7.00,
                'image_path' => null,
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Milkshake Morango',
                'description' => 'Cremoso milkshake de morango com cobertura.',
                'price' => 15.00,
                'image_path' => null,
                'is_available' => false, // exemplo fora do cardápio
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
