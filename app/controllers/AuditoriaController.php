<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class AuditoriaController extends Controller
{
    public function index(): void
    {
        // placeholder view for AuditoriaController
        $this->render('dashboard/placeholder.php', ['title' => 'AuditoriaController']);
    }
}
