<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class TemplatesController extends Controller
{
    public function index(): void
    {
        // placeholder view for TemplatesController
        $this->render('dashboard/placeholder.php', ['title' => 'TemplatesController']);
    }
}
