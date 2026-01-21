<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class AlertasController extends Controller
{
    public function index(): void
    {
        // placeholder view for AlertasController
        $this->render('dashboard/placeholder.php', ['title' => 'AlertasController']);
    }
}
