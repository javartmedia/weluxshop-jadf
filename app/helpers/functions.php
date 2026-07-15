<?php
function url(string $path = ''): string {
    $app = include __DIR__ . '/../../config/app.php';
    $base = rtrim($app['app_url'], '/');
    return $base . '/' . ltrim($path, '/');
}

function asset(string $path): string {
    return url('assets/' . ltrim($path, '/'));
}

function redirect(string $path): void {
    header('Location: ' . url($path));
    exit;
}

function old(string $key, string $default = '') {
    return $_SESSION['old'][$key] ?? $default;
}

function csrf_field(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return '<input type="hidden" name="_token" value="' . $_SESSION['csrf_token'] . '">';
}

function method_field(string $method): string {
    return '<input type="hidden" name="_method" value="' . $method . '">';
}

function isLoggedIn(): bool {
    return isset($_SESSION['user_id']);
}

function currentUser(): ?array {
    if (!isLoggedIn()) return null;
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch() ?: null;
}

function isAdmin(): bool {
    return (currentUser()['role'] ?? '') === 'admin';
}

function formatRupiah(int $amount): string {
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

function slugify(string $text): string {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    return strtolower($text);
}
