<?php
require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
require_once __DIR__ . '/../../config/database.php';
$schema = file_get_contents(__DIR__ . '/../sql/schema.sql');
$pdo->exec($schema);
echo "Migration completed.\n";
