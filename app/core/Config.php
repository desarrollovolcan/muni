<?php
namespace App\Core;

use Dotenv\Dotenv;

class Config
{
    private static array $config = [];

    public static function load(string $basePath): void
    {
        if (file_exists($basePath . '/.env')) {
            $dotenv = Dotenv::createImmutable($basePath);
            $dotenv->load();
        }

        self::$config = [
            'db' => [
                'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
                'name' => $_ENV['DB_NAME'] ?? 'mun_beneficios',
                'user' => $_ENV['DB_USER'] ?? 'root',
                'pass' => $_ENV['DB_PASS'] ?? '',
            ],
            'app_url' => rtrim($_ENV['APP_URL'] ?? 'http://localhost', '/'),
            'storage_path' => $_ENV['STORAGE_PATH'] ?? ($basePath . '/storage'),
            'session_secure' => (bool)($_ENV['SESSION_SECURE'] ?? false),
            'mail_worker_enabled' => (bool)($_ENV['MAIL_WORKER_ENABLED'] ?? false),
        ];
    }

    public static function get(string $key, $default = null)
    {
        return self::$config[$key] ?? $default;
    }
}
