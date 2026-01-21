<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class RshController extends Controller
{
    public function index(): void
    {
        // placeholder view for RshController
        $this->render('dashboard/placeholder.php', ['title' => 'RshController']);
    }
}
