<?php
namespace App\Controllers\Api;

use App\Core\Controller;
use App\Models\Product;

class ProductController extends Controller {
    public function index() {
        $products = Product::all(['created_at'=>'DESC']);
        $this->json($products);
    }

    public function show($id) {
        $product = Product::find($id);
        if (!$product) $this->json(['error'=>'Not found'], 404);
        $this->json($product);
    }
}
