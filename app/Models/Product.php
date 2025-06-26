<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_path',
        'is_available',
    ];

    // Escopo para filtrar produtos disponíveis
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }
}
