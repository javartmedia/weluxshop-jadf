<?php
namespace App\Models;

use App\Core\Model;

class Slider extends Model {
    protected static string $table = 'sliders';
    protected static array $fillable = ['title', 'description', 'image', 'link', 'order', 'is_active'];
}
