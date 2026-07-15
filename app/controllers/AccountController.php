<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Address;

class AccountController extends Controller {
    public function profile() {
        $user = currentUser();
        $this->view('account/profile', compact('user'));
    }

    public function updateProfile() {
        // validate and update
    }

    public function orders() {
        $orders = Order::query("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC", [$_SESSION['user_id']])->fetchAll();
        $this->view('account/orders', compact('orders'));
    }

    public function wishlist() {
        $wishlist = Wishlist::query("SELECT w.*, p.name, p.price, p.image FROM wishlists w JOIN products p ON w.product_id = p.id WHERE w.user_id = ?", [$_SESSION['user_id']])->fetchAll();
        $this->view('account/wishlist', compact('wishlist'));
    }

    public function addresses() {
        $addresses = Address::query("SELECT * FROM addresses WHERE user_id = ?", [$_SESSION['user_id']])->fetchAll();
        $this->view('account/addresses', compact('addresses'));
    }

    public function vouchers() {
        // list user vouchers
    }

    public function points() {
        // reward points
    }
}
