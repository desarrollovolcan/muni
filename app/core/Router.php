<?php
namespace App\Core;

class Router
{
    private array $routes = [];

    private function normalizePath(string $path): string
    {
        $normalized = rtrim($path, '/') ?: '/';

        $scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
        if ($scriptDir !== '' && $scriptDir !== '/' && strpos($normalized, $scriptDir) === 0) {
            $normalized = substr($normalized, strlen($scriptDir)) ?: '/';
        }

        return $normalized;
    }

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$this->normalizePath($path)] = $handler;
    }

    public function post(string $path, callable $handler): void
    {
        $this->routes['POST'][$this->normalizePath($path)] = $handler;
    }

    public function dispatch(string $method, string $uri)
    {
        $path = $this->normalizePath(parse_url($uri, PHP_URL_PATH));
        if (isset($this->routes[$method][$path])) {
            return call_user_func($this->routes[$method][$path]);
        }

        foreach ($this->routes[$method] ?? [] as $route => $handler) {
            if (strpos($route, '{') === false) {
                continue;
            }

            $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route);
            if (preg_match('#^' . $pattern . '$#', $path, $matches)) {
                array_shift($matches);
                return call_user_func_array($handler, $matches);
            }
        }

        header('HTTP/1.0 404 Not Found');
        echo '404 Not Found';
        exit;
    }
}
