<?php
namespace App\Models;

use App\Core\Model;

class Promo extends Model {
    protected static string $table = 'promotions';
    protected static array $fillable = ['name', 'slug', 'description', 'banner', 'start_date', 'end_date', 'discount_type', 'discount_value', 'is_active'];
}
