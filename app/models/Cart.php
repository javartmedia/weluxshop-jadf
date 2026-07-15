<?php
namespace App\Models;

use App\Core\Model;

class Cart extends Model {
    protected static string $table = 'carts';
    protected static array $fillable = ['user_id', 'session_id'];

    public static function getUserCart(int $userId): ?array {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM carts WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch() ?: null;
    }

    public static function items(int $cartId): array {
        global $pdo;
        $stmt = $pdo->prepare("
            SELECT ci.*, p.name AS product_name, p.price, p.sale_price, p.image
            FROM cart_items ci
            JOIN products p ON p.id = ci.product_id
            WHERE ci.cart_id = ?
        ");
        $stmt->execute([$cartId]);
        return $stmt->fetchAll();
    }

    public static function clearCart(int $cartId): void {
        global $pdo;
        $pdo->prepare("DELETE FROM cart_items WHERE cart_id = ?")->execute([$cartId]);
    }
}
