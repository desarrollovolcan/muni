<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class RequisitosController extends Controller
{
    public function index(): void
    {
        // placeholder view for RequisitosController
        $this->render('dashboard/placeholder.php', ['title' => 'RequisitosController']);
    }
}
