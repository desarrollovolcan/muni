<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class BeneficiariosController extends Controller
{
    public function index(): void
    {
        // placeholder view for BeneficiariosController
        $this->render('dashboard/placeholder.php', ['title' => 'BeneficiariosController']);
    }
}
