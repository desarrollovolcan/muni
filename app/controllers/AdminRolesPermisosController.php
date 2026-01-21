<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class AdminRolesPermisosController extends Controller
{
    public function index(): void
    {
        // placeholder view for AdminRolesPermisosController
        $this->render('dashboard/placeholder.php', ['title' => 'AdminRolesPermisosController']);
    }
}
