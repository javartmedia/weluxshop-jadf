<?php
namespace App\Models;

use App\Core\Model;

class User extends Model {
    protected static string $table = 'users';
    protected static string $primaryKey = 'id';
    protected static array $fillable = ['name', 'email', 'password', 'phone', 'avatar', 'role', 'email_verified_at'];
    protected static array $hidden = ['password', 'remember_token'];

    public static function findByEmail(string $email): ?array {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() ?: null;
    }
}
