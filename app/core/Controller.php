<?php
namespace App\Core;

class Controller
{
    protected string $layout = 'layouts/main.php';

    protected function render(string $view, array $params = [], ?string $layout = null): void
    {
        extract($params);
        $content = $this->renderView($view, $params);
        $layoutFile = __DIR__ . '/../views/' . ($layout ?? $this->layout);
        if (file_exists($layoutFile)) {
            include $layoutFile;
        } else {
            echo $content;
        }
    }

    protected function renderView(string $view, array $params = []): string
    {
        extract($params);
        ob_start();
        include __DIR__ . '/../views/' . $view;
        return ob_get_clean();
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . $path);
        exit;
    }
}
