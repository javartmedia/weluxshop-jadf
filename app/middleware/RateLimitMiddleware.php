<?php
namespace App\Middleware;

use App\Core\MiddlewareInterface;

class RateLimitMiddleware implements MiddlewareInterface {
    public function handle(): void {
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = "rate_limit_$ip";
        $limit = 60; // requests per minute
        $now = time();
        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = ['count' => 0, 'reset' => $now + 60];
        }
        $data = &$_SESSION[$key];
        if ($now > $data['reset']) {
            $data['count'] = 0;
            $data['reset'] = $now + 60;
        }
        if ($data['count'] >= $limit) {
            http_response_code(429);
            die('Too many requests. Please try again later.');
        }
        $data['count']++;
    }
}
