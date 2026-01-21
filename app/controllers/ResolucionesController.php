<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class ResolucionesController extends Controller
{
    public function index(): void
    {
        // placeholder view for ResolucionesController
        $this->render('dashboard/placeholder.php', ['title' => 'ResolucionesController']);
    }
}
