<?php
namespace App\Models;

use App\Core\Model;

class Contact extends Model {
    protected static string $table = 'contact_messages';
    protected static array $fillable = ['name', 'email', 'phone', 'subject', 'message', 'is_read'];
}
