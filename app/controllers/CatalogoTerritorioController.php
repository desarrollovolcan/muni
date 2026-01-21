<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class CatalogoTerritorioController extends Controller
{
    public function index(): void
    {
        // placeholder view for CatalogoTerritorioController
        $this->render('dashboard/placeholder.php', ['title' => 'CatalogoTerritorioController']);
    }
}
