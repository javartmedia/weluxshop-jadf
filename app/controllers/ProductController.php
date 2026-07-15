<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller {
    public function index() {
        $page = $_GET['page'] ?? 1;
        $limit = 12;
        $offset = ($page - 1) * $limit;
        $category = $_GET['category'] ?? '';
        $brand = $_GET['brand'] ?? '';
        $search = $_GET['search'] ?? '';
        $sort = $_GET['sort'] ?? 'newest';
        $where = "WHERE p.is_active = 1";
        $params = [];
        if ($category) {
            $where .= " AND c.slug = ?";
            $params[] = $category;
        }
        if ($brand) {
            $where .= " AND b.slug = ?";
            $params[] = $brand;
        }
        if ($search) {
            $where .= " AND (p.name LIKE ? OR p.description LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }
        $order = match($sort) {
            'price_asc' => 'p.price ASC',
            'price_desc' => 'p.price DESC',
            'name_asc' => 'p.name ASC',
            'name_desc' => 'p.name DESC',
            default => 'p.created_at DESC',
        };
        $countSql = "SELECT COUNT(*) FROM products p JOIN categories c ON p.category_id = c.id JOIN brands b ON p.brand_id = b.id $where";
        $sql = "SELECT p.*, c.name AS category_name, b.name AS brand_name FROM products p JOIN categories c ON p.category_id = c.id JOIN brands b ON p.brand_id = b.id $where ORDER BY $order LIMIT $limit OFFSET $offset";
        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->execute($params);
        $products = $stmt->fetchAll();
        $totalStmt = $GLOBALS['pdo']->prepare($countSql);
        $totalStmt->execute($params);
        $total = $totalStmt->fetchColumn();
        $totalPages = ceil($total / $limit);
        $categories = Category::all(['name'=>'ASC']);
        $brands = Brand::all(['name'=>'ASC']);
        $this->view('products/index', compact('products', 'categories', 'brands', 'page', 'totalPages', 'category', 'brand', 'search', 'sort'));
    }

    public function detail($slug) {
        $product = Product::query("SELECT * FROM products WHERE slug = ? AND is_active = 1", [$slug])->fetch();
        if (!$product) {
            redirect('products');
        }
        $related = Product::query("SELECT * FROM products WHERE category_id = ? AND id != ? LIMIT 4", [$product['category_id'], $product['id']])->fetchAll();
        $reviews = \App\Models\Review::query("SELECT r.*, u.name FROM product_reviews r JOIN users u ON r.user_id = u.id WHERE product_id = ? AND is_approved = 1", [$product['id']])->fetchAll();
        $this->view('products/detail', compact('product', 'related', 'reviews'));
    }
}
