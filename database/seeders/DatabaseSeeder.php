<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Cria um usuário admin de exemplo
    \App\Models\User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);

    // Popula os produtos
    $this->call([
        \Database\Seeders\ProductSeeder::class,
    ]);
}

    
}
