<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class NotificacionesController extends Controller
{
    public function index(): void
    {
        // placeholder view for NotificacionesController
        $this->render('dashboard/placeholder.php', ['title' => 'NotificacionesController']);
    }
}
