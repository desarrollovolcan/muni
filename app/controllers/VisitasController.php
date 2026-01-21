<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class VisitasController extends Controller
{
    public function index(): void
    {
        // placeholder view for VisitasController
        $this->render('dashboard/placeholder.php', ['title' => 'VisitasController']);
    }
}
