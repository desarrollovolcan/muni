<?php
namespace Dotenv;

class Dotenv
{
    private string $basePath;

    private function __construct(string $basePath)
    {
        $this->basePath = rtrim($basePath, '/');
    }

    public static function createImmutable(string $basePath): self
    {
        return new self($basePath);
    }

    public function load(): void
    {
        $envFile = $this->basePath . '/.env';
        if (!is_readable($envFile)) {
            return;
        }

        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (str_starts_with($line, '#') || !str_contains($line, '=')) {
                continue;
            }

            [$key, $value] = array_map('trim', explode('=', $line, 2));
            if ($key === '') {
                continue;
            }

            $value = $this->stripQuotes($value);
            $_ENV[$key] = $_SERVER[$key] = $value;
        }
    }

    private function stripQuotes(string $value): string
    {
        if ((str_starts_with($value, '"') && str_ends_with($value, '"')) || (str_starts_with($value, "'") && str_ends_with($value, "'"))) {
            return substr($value, 1, -1);
        }

        return $value;
    }
}
