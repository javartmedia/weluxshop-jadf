<?php
namespace App\Models;

use App\Core\Model;

class Notification extends Model {
    protected static string $table = 'notifications';
    protected static array $fillable = ['user_id', 'type', 'data', 'read_at'];
}
