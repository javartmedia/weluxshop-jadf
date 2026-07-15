<?php
namespace App\Models;

use App\Core\Model;

class Newsletter extends Model {
    protected static string $table = 'newsletters';
    protected static array $fillable = ['email', 'status'];
}
