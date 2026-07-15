<?php
namespace App\Core;

class View {
    public static function render(string $view, array $data = [], string $layout = 'main'): void {
        $viewPath = __DIR__ . "/../views/$view.php";
        $layoutPath = __DIR__ . "/../views/layouts/$layout.php";
        if (!file_exists($viewPath)) {
            throw new \Exception("View [$view] not found.");
        }
        extract($data);
        ob_start();
        require $viewPath;
        $content = ob_get_clean();
        if ($layout && file_exists($layoutPath)) {
            require $layoutPath;
        } else {
            echo $content;
        }
    }
}
