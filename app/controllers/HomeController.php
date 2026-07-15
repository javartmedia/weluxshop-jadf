<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Testimonial;
use App\Models\Article;

class HomeController extends Controller {
    public function index() {
        $banners = Banner::all(['order'=>'ASC']);
        $categories = Category::all(['name'=>'ASC']);
        $products = Product::query("SELECT * FROM products WHERE is_active = 1 ORDER BY created_at DESC LIMIT 8")->fetchAll();
        $bestSellers = Product::query("SELECT p.*, COUNT(oi.id) as sold FROM products p JOIN order_items oi ON p.id = oi.product_id GROUP BY p.id ORDER BY sold DESC LIMIT 8")->fetchAll();
        $testimonials = Testimonial::query("SELECT * FROM testimonials WHERE is_approved = 1 LIMIT 6")->fetchAll();
        $articles = Article::query("SELECT * FROM articles WHERE is_published = 1 ORDER BY published_at DESC LIMIT 4")->fetchAll();
        $this->view('home', compact('banners', 'categories', 'products', 'bestSellers', 'testimonials', 'articles'));
    }
}
