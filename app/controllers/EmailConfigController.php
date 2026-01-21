<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class EmailConfigController extends Controller
{
    public function index(): void
    {
        // placeholder view for EmailConfigController
        $this->render('dashboard/placeholder.php', ['title' => 'EmailConfigController']);
    }
}
