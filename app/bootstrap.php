<?php

declare(strict_types=1);

session_start();

$config = require __DIR__ . '/../config/database.php';

function db(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $settings = $GLOBALS['config']['db'];
    $dsn = sprintf(
        'mysql:host=%s;dbname=%s;charset=%s',
        $settings['host'],
        $settings['name'],
        $settings['charset']
    );

    $pdo = new PDO($dsn, $settings['user'], $settings['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $pdo;
}

function redirect(string $path): void
{
    header('Location: ' . $path);
    exit;
}

function csrf_token(): string
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function verify_csrf(?string $token): bool
{
    return isset($_SESSION['csrf_token']) && is_string($token) && hash_equals($_SESSION['csrf_token'], $token);
}
