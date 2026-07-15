<?php
namespace App\Models;

use App\Core\Model;

class Banner extends Model {
    protected static string $table = 'banners';
    protected static array $fillable = ['title', 'subtitle', 'image', 'link', 'order', 'is_active'];
}
