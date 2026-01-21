<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class SolicitudesController extends Controller
{
    public function index(): void
    {
        // placeholder view for SolicitudesController
        $this->render('dashboard/placeholder.php', ['title' => 'SolicitudesController']);
    }
}
