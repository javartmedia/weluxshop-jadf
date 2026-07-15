<?php
namespace App\Models;

use App\Core\Model;

class Wishlist extends Model {
    protected static string $table = 'wishlists';
    protected static array $fillable = ['user_id', 'product_id'];
}
