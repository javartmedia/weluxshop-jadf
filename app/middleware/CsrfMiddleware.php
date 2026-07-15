<?php
namespace App\Middleware;

use App\Core\MiddlewareInterface;

class CsrfMiddleware implements MiddlewareInterface {
    public function handle(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['_token'] ?? '';
            if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
                http_response_code(419);
                die('CSRF token mismatch.');
            }
            // regenerate token to prevent reuse?
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }
}
