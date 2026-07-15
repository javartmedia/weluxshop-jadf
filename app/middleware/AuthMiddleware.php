<?php
namespace App\Middleware;

use App\Core\MiddlewareInterface;

class AuthMiddleware implements MiddlewareInterface {
    public function handle(): void {
        if (!isLoggedIn()) {
            $_SESSION['intended_url'] = $_SERVER['REQUEST_URI'];
            redirect('login');
        }
    }
}
