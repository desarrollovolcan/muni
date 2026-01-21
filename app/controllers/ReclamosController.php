<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class ReclamosController extends Controller
{
    public function index(): void
    {
        // placeholder view for ReclamosController
        $this->render('dashboard/placeholder.php', ['title' => 'ReclamosController']);
    }
}
