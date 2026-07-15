<?php
namespace App\Models;

use App\Core\Model;

class Order extends Model {
    protected static string $table = 'orders';
    protected static array $fillable = [
        'user_id', 'order_number', 'subtotal', 'discount', 'shipping_cost',
        'total', 'status', 'shipping_address', 'shipping_method',
        'payment_method', 'payment_status', 'notes', 'tracking_number'
    ];

    public static function addItem(array $data): void {
        global $pdo;
        $pdo->prepare("INSERT INTO order_items (order_id, product_id, price, quantity) VALUES (?, ?, ?, ?)")
            ->execute([$data['order_id'], $data['product_id'], $data['price'], $data['quantity']]);
    }
}
