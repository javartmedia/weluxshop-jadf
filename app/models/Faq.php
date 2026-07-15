<?php
namespace App\Models;

use App\Core\Model;

class Faq extends Model {
    protected static string $table = 'faqs';
    protected static array $fillable = ['question', 'answer', 'order', 'is_active'];
}
