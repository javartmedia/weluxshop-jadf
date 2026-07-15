<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\OrderService;

class CheckoutController extends Controller {
    public function index() {
        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) redirect('login');
        $cart = \App\Models\Cart::getUserCart($userId);
        if (!$cart) redirect('cart');
        $items = \App\Models\Cart::items($cart['id']);
        if (empty($items)) redirect('cart');
        $this->view('checkout', compact('items', 'cart'));
    }

    public function process() {
        $userId = $_SESSION['user_id'];
        $data = $_POST;
        $service = new OrderService();
        try {
            $orderId = $service->createOrderFromCart($userId, $data);
            redirect('order/success/'.$orderId);
        } catch (\Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            redirect('checkout');
        }
    }
}
