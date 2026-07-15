<?php
namespace App\Models;

use App\Core\Model;

class Treatment extends Model {
    protected static string $table = 'treatments';
    protected static array $fillable = [
        'name', 'slug', 'description', 'benefits', 'duration', 'price',
        'category_id', 'image', 'is_active'
    ];
}
