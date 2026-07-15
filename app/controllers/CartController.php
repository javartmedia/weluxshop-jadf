<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller {
    public function index() {
        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) redirect('login');
        $cart = Cart::getUserCart($userId);
        $items = $cart ? Cart::items($cart['id']) : [];
        $this->view('cart/index', compact('items'));
    }

    public function add() {
        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) { $this->json(['error'=>'Login required'], 401); return; }
        $productId = $_POST['product_id'] ?? null;
        $qty = $_POST['quantity'] ?? 1;
        $cart = Cart::getUserCart($userId);
        if (!$cart) {
            $cartId = Cart::create(['user_id'=>$userId]);
            $cart = Cart::find($cartId);
        }
        // check existing item
        global $pdo;
        $stmt = $pdo->prepare("SELECT id FROM cart_items WHERE cart_id=? AND product_id=?");
        $stmt->execute([$cart['id'], $productId]);
        $existing = $stmt->fetch();
        if ($existing) {
            $pdo->prepare("UPDATE cart_items SET quantity = quantity + ? WHERE id=?")->execute([$qty, $existing['id']]);
        } else {
            $price = Product::find($productId)['sale_price'] ?? Product::find($productId)['price'];
            $pdo->prepare("INSERT INTO cart_items (cart_id, product_id, quantity, price) VALUES (?,?,?,?)")->execute([$cart['id'], $productId, $qty, $price]);
        }
        $this->json(['message'=>'Cart updated']);
    }

    public function update() {
        // AJAX update qty
    }

    public function remove() {
        // AJAX remove item
    }
}
