<?php
namespace App\Models;

use App\Core\Model;

class Article extends Model {
    protected static string $table = 'articles';
    protected static array $fillable = [
        'title', 'slug', 'content', 'image', 'category_id',
        'author_id', 'meta_title', 'meta_description', 'is_published',
        'published_at'
    ];
}
