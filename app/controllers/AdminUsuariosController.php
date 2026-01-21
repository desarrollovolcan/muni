<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class AdminUsuariosController extends Controller
{
    public function index(): void
    {
        // placeholder view for AdminUsuariosController
        $this->render('dashboard/placeholder.php', ['title' => 'AdminUsuariosController']);
    }
}
