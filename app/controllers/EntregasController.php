<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class EntregasController extends Controller
{
    public function index(): void
    {
        // placeholder view for EntregasController
        $this->render('dashboard/placeholder.php', ['title' => 'EntregasController']);
    }
}
