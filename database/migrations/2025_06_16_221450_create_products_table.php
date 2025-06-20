<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // PK BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('name'); // VARCHAR(255) NOT NULL
            $table->text('description')->nullable(); // TEXT NULLABLE
            $table->decimal('price', 8, 2); // DECIMAL(8, 2) NOT NULL
            $table->string('image_path')->nullable(); // VARCHAR(255) NULLABLE
            $table->boolean('is_available')->default(true); // BOOLEAN NOT NULL (com default)
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};