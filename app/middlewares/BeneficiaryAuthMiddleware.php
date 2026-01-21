<?php
namespace App\Middlewares;

use App\Core\Auth;

class BeneficiaryAuthMiddleware
{
    public static function handle(): void
    {
        if (!Auth::checkBeneficiary()) {
            header('Location: /portal/login');
            exit;
        }
    }
}
