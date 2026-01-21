<?php
namespace App\Middlewares;

use App\Core\Auth;

class RoleMiddleware
{
    public static function requireRole(string $role): void
    {
        Auth::startSession();
        $roles = $_SESSION['roles'] ?? [];
        if (!in_array($role, $roles)) {
            header('HTTP/1.1 403 Forbidden');
            echo '403 Acceso denegado';
            exit;
        }
    }
}
