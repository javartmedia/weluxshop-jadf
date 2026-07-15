<?php
namespace App\Models;

use App\Core\Model;

class Review extends Model {
    protected static string $table = 'product_reviews';
    protected static array $fillable = ['product_id', 'user_id', 'rating', 'comment', 'is_approved'];
}
