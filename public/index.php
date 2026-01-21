<?php
$autoload = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoload)) {
    require $autoload;
} else {
    spl_autoload_register(function (string $class): void {
        $basePath = dirname(__DIR__);

        if (strpos($class, 'App\\') === 0) {
            $path = $basePath . '/' . str_replace('\\', '/', $class) . '.php';
            if (file_exists($path)) {
                require $path;
            }
            return;
        }

        if (strpos($class, 'Dotenv\\') === 0) {
            require_once $basePath . '/app/support/FallbackDotenv.php';
            return;
        }

        if (strpos($class, 'PHPMailer\\PHPMailer\\') === 0) {
            require_once $basePath . '/app/support/FallbackPHPMailer.php';
        }
    });

    require_once __DIR__ . '/../app/helpers/rut_helper.php';
    require_once __DIR__ . '/../app/helpers/view_helper.php';
    require_once __DIR__ . '/../app/helpers/date_helper.php';
    require_once __DIR__ . '/../app/helpers/money_helper.php';
}

use App\Core\Config;
use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\PortalAuthController;
use App\Controllers\PortalDashboardController;
use App\Controllers\PortalBeneficiosController;

Config::load(dirname(__DIR__));

$router = new Router();

$authController = new AuthController();
$router->get('/login', fn() => $authController->loginForm());
$router->post('/login', fn() => $authController->login());
$router->get('/register', fn() => $authController->registerForm());
$router->post('/register', fn() => $authController->register());
$router->get('/logout', fn() => $authController->logout());

$dashboard = new DashboardController();
$router->get('/dashboard', fn() => $dashboard->index());

$home = new HomeController();
$router->get('/inicio', fn() => $home->index());
$router->get('/', fn() => $authController->loginForm());

$portalAuth = new PortalAuthController();
$router->get('/portal/login', fn() => $portalAuth->loginForm());
$router->post('/portal/login', fn() => $portalAuth->login());
$router->get('/portal/logout', fn() => $portalAuth->logout());

$portalDash = new PortalDashboardController();
$router->get('/portal', fn() => $portalDash->index());

$portalBeneficios = new PortalBeneficiosController();
$router->get('/portal/beneficios', fn() => $portalBeneficios->index());
$router->get('/portal/beneficios/{id}', function ($id) use ($portalBeneficios) {
    $portalBeneficios->show((int) $id);
});

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
