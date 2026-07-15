<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller {
    public function index() {
        $products = Product::all(['created_at'=>'DESC']);
        $this->view('admin/products/index', compact('products'), 'admin');
    }

    public function create() {
        $categories = Category::all(['name'=>'ASC']);
        $brands = Brand::all(['name'=>'ASC']);
        $this->view('admin/products/edit', compact('categories', 'brands'), 'admin');
    }

    public function store() {
        // validate and create
        $data = $_POST;
        $data['slug'] = slugify($data['name']);
        if (isset($_FILES['image'])) {
            $data['image'] = $this->uploadImage($_FILES['image']);
        }
        Product::create($data);
        redirect('admin/products');
    }

    public function edit($id) {
        $product = Product::find($id);
        $categories = Category::all(['name'=>'ASC']);
        $brands = Brand::all(['name'=>'ASC']);
        $this->view('admin/products/edit', compact('product', 'categories', 'brands'), 'admin');
    }

    public function update($id) {
        $data = $_POST;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $data['image'] = $this->uploadImage($_FILES['image']);
        }
        Product::update($id, $data);
        redirect('admin/products');
    }

    public function delete($id) {
        Product::delete($id);
        redirect('admin/products');
    }

    protected function uploadImage($file): string {
        $targetDir = __DIR__ . '/../../../public/uploads/products/';
        if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);
        $filename = time() . '_' . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $targetDir . $filename);
        return 'uploads/products/' . $filename;
    }
}
