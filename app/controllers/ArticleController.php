<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleController extends Controller {
    public function index() {
        $articles = Article::query("SELECT * FROM articles WHERE is_published = 1 ORDER BY published_at DESC")->fetchAll();
        $categories = ArticleCategory::all(['name'=>'ASC']);
        $this->view('articles/index', compact('articles', 'categories'));
    }

    public function detail($slug) {
        $article = Article::query("SELECT * FROM articles WHERE slug = ?", [$slug])->fetch();
        $this->view('articles/detail', compact('article'));
    }
}
