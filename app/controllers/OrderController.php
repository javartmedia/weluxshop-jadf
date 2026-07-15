<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Order;

class OrderController extends Controller {
    public function success($id) {
        $order = Order::find($id);
        $this->view('order/success', compact('order'));
    }

    public function tracking($orderNumber) {
        $order = Order::query("SELECT * FROM orders WHERE order_number = ?", [$orderNumber])->fetch();
        $this->view('order/tracking', compact('order'));
    }
}
