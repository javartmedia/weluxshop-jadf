<?php
namespace App\Models;

use App\Core\Model;

class Category extends Model {
    protected static string $table = 'categories';
    protected static array $fillable = ['name', 'slug', 'icon', 'image', 'parent_id', 'is_active'];
}
