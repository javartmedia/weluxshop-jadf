<?php
namespace App\Models;

use App\Core\Model;

class Doctor extends Model {
    protected static string $table = 'doctors';
    protected static array $fillable = ['name', 'slug', 'photo', 'specialization', 'bio', 'schedule', 'is_active'];
}
