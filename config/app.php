<?php
return [
    'app_name' => 'WeluxShop',
    'app_url' => $_ENV['APP_URL'] ?? 'http://localhost',
    'app_env' => $_ENV['APP_ENV'] ?? 'production',
    'app_debug' => $_ENV['APP_DEBUG'] ?? 'false',
    'timezone' => 'Asia/Jakarta',
    'locale' => 'id_ID',
    'currency' => 'IDR',
    'admin_email' => 'admin@weluxshop.com',
    'support_email' => 'support@weluxshop.com',
    'social_links' => [
        'facebook' => 'https://facebook.com/weluxshop',
        'instagram' => 'https://instagram.com/weluxshop',
        'twitter' => 'https://twitter.com/weluxshop',
        'whatsapp' => 'https://wa.me/6281234567890',
    ]
];
