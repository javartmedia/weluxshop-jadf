<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class DashboardController extends Controller {
    public function index() {
        $stats = [
            'products' => \App\Models\Product::query("SELECT COUNT(*) FROM products")->fetchColumn(),
            'orders' => \App\Models\Order::query("SELECT COUNT(*) FROM orders")->fetchColumn(),
            'customers' => \App\Models\User::query("SELECT COUNT(*) FROM users WHERE role='customer'")->fetchColumn(),
            'revenue' => \App\Models\Order::query("SELECT SUM(total) FROM orders WHERE status='completed'")->fetchColumn() ?? 0,
        ];
        $salesChart = \App\Models\Order::query("
            SELECT DATE(created_at) as date, SUM(total) as total
            FROM orders WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)
            GROUP BY DATE(created_at)
            ORDER BY date ASC
        ")->fetchAll();
        $topProducts = \App\Models\Product::query("
            SELECT p.name, SUM(oi.quantity) as sold
            FROM order_items oi JOIN products p ON oi.product_id = p.id
            GROUP BY p.id ORDER BY sold DESC LIMIT 5
        ")->fetchAll();
        $this->view('admin/dashboard', compact('stats', 'salesChart', 'topProducts'), 'admin');
    }
}
