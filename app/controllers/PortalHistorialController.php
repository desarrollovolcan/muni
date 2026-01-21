<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class PortalHistorialController extends Controller
{
    public function index(): void
    {
        // placeholder view for PortalHistorialController
        $this->render('dashboard/placeholder.php', ['title' => 'PortalHistorialController']);
    }
}
