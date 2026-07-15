<?php
namespace App\Core;

class Router {
    private array $routes = [];
    private array $middlewares = [];

    public function add(string $method, string $pattern, callable|array $handler, array $middlewares = []): void {
        $this->routes[] = compact('method', 'pattern', 'handler', 'middlewares');
    }

    public function dispatch(string $method, string $uri): void {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';

        foreach ($this->routes as $route) {
            $pattern = '#^' . rtrim($route['pattern'], '/') . '$#';
            if ($route['method'] !== $method && $route['method'] !== 'ANY') continue;
            if (!preg_match($pattern, $uri, $matches)) continue;

            array_shift($matches); // remove full match

            // Run global middlewares (applied in routes)
            foreach ($route['middlewares'] as $mw) {
                require_once __DIR__ . "/../middleware/$mw.php";
                $mwClass = "App\\Middleware\\$mw";
                (new $mwClass)->handle();
            }

            if (is_array($route['handler'])) {
                [$class, $action] = $route['handler'];
                require_once __DIR__ . "/../controllers/{$class}.php";
                $controllerClass = "App\\Controllers\\$class";
                $controller = new $controllerClass();
                call_user_func_array([$controller, $action], $matches);
            } else {
                call_user_func_array($route['handler'], $matches);
            }
            return;
        }
        http_response_code(404);
        echo "404 Not Found";
    }
}
