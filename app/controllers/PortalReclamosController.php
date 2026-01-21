<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class PortalReclamosController extends Controller
{
    public function index(): void
    {
        // placeholder view for PortalReclamosController
        $this->render('dashboard/placeholder.php', ['title' => 'PortalReclamosController']);
    }
}
