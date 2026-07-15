<?php
namespace App\Services;

use App\Models\Order;
use App\Models\Cart;

class OrderService {
    public function createOrderFromCart(int $userId, array $data): int {
        global $pdo;
        $pdo->beginTransaction();
        try {
            $cart = Cart::getUserCart($userId);
            if (!$cart) throw new \Exception('Cart is empty.');
            $items = Cart::items($cart['id']);
            $subtotal = 0;
            foreach ($items as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            $orderData = [
                'user_id' => $userId,
                'order_number' => $this->generateOrderNumber(),
                'subtotal' => $subtotal,
                'discount' => 0,
                'shipping_cost' => $data['shipping_cost'] ?? 0,
                'total' => $subtotal + ($data['shipping_cost'] ?? 0),
                'status' => 'pending',
                'shipping_address' => $data['shipping_address'],
                'shipping_method' => $data['shipping_method'],
                'payment_method' => $data['payment_method'],
                'notes' => $data['notes'] ?? '',
            ];
            $orderId = Order::create($orderData);
            // Move cart items to order items
            foreach ($items as $item) {
                Order::addItem([
                    'order_id' => $orderId,
                    'product_id' => $item['product_id'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ]);
            }
            Cart::clearCart($cart['id']);
            // Apply voucher if any
            if (!empty($data['voucher_code'])) {
                // reduce discount, etc.
            }
            $pdo->commit();
            return $orderId;
        } catch (\Exception $e) {
            $pdo->rollBack();
            throw $e;
        }
    }

    private function generateOrderNumber(): string {
        return 'INV/' . date('Ymd') . '/' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
    }
}
