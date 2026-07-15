<?php
namespace App\Models;

use App\Core\Model;

class Testimonial extends Model {
    protected static string $table = 'testimonials';
    protected static array $fillable = ['name', 'photo', 'content', 'rating', 'is_approved'];
}
