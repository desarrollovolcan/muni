<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class PresupuestosController extends Controller
{
    public function index(): void
    {
        // placeholder view for PresupuestosController
        $this->render('dashboard/placeholder.php', ['title' => 'PresupuestosController']);
    }
}
