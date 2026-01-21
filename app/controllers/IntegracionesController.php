<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class IntegracionesController extends Controller
{
    public function index(): void
    {
        // placeholder view for IntegracionesController
        $this->render('dashboard/placeholder.php', ['title' => 'IntegracionesController']);
    }
}
