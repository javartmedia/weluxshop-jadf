<?php
namespace App\Models;

use App\Core\Model;

class Setting extends Model {
    protected static string $table = 'settings';
    protected static array $fillable = ['key', 'value'];
}
