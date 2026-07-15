<?php
namespace App\Models;

use App\Core\Model;

class CartItem extends Model {
    protected static string $table = 'cart_items';
    protected static array $fillable = ['cart_id', 'product_id', 'quantity', 'price'];
}
