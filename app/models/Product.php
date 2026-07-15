<?php
namespace App\Models;

use App\Core\Model;

class Product extends Model {
    protected static string $table = 'products';
    protected static array $fillable = [
        'name', 'slug', 'sku', 'price', 'sale_price', 'cost',
        'stock', 'min_order', 'weight', 'description', 'ingredients',
        'how_to_use', 'brand_id', 'category_id', 'skin_type',
        'is_featured', 'is_active', 'meta_title', 'meta_description',
        'image'
    ];
    protected static array $hidden = ['cost'];
}
