<?php
namespace App\Models;

use App\Core\Model;

class Brand extends Model {
    protected static string $table = 'brands';
    protected static array $fillable = ['name', 'slug', 'logo', 'description', 'is_active'];
}
