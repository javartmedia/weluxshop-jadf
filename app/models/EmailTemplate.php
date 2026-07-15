<?php
namespace App\Models;

use App\Core\Model;

class EmailTemplate extends Model {
    protected static string $table = 'email_templates';
    protected static array $fillable = ['name', 'subject', 'body', 'params'];
}
