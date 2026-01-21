<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class GrupoFamiliarController extends Controller
{
    public function index(): void
    {
        // placeholder view for GrupoFamiliarController
        $this->render('dashboard/placeholder.php', ['title' => 'GrupoFamiliarController']);
    }
}
