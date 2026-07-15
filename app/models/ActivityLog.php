<?php
namespace App\Models;

use App\Core\Model;

class ActivityLog extends Model {
    protected static string $table = 'activity_logs';
    protected static array $fillable = ['user_id', 'description', 'ip_address', 'user_agent'];
}
