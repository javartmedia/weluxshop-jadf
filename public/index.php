<?php
declare(strict_types=1);

session_start();

// Load environment variables
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Load configurations
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/session.php';
require_once __DIR__ . '/../config/mail.php';

// Autoload helpers
require_once __DIR__ . '/../app/helpers/functions.php';

// Core app initialization
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/Model.php';
require_once __DIR__ . '/../app/core/View.php';
require_once __DIR__ . '/../app/core/Middleware.php';

// Load middleware
require_once __DIR__ . '/../app/middleware/AuthMiddleware.php';
require_once __DIR__ . '/../app/middleware/CsrfMiddleware.php';
require_once __DIR__ . '/../app/middleware/RateLimitMiddleware.php';

// Services & Repositories
require_once __DIR__ . '/../app/services/AuthService.php';
require_once __DIR__ . '/../app/services/OrderService.php';
require_once __DIR__ . '/../app/services/BookingService.php';
require_once __DIR__ . '/../app/services/PaymentService.php';
require_once __DIR__ . '/../app/services/NotificationService.php';
require_once __DIR__ . '/../app/repositories/BaseRepository.php';
require_once __DIR__ . '/../app/repositories/UserRepository.php';

// Load all models (autoload via composer or manual)
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Load routes
require_once __DIR__ . '/../app/config/routes.php';

// Dispatch router
$router = new App\Core\Router();
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
