<?php
namespace App\Models;

use App\Core\Model;

class Branch extends Model {
    protected static string $table = 'branches';
    protected static array $fillable = ['name', 'slug', 'address', 'phone', 'map_url', 'is_active'];
}
