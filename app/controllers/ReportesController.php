<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class ReportesController extends Controller
{
    public function index(): void
    {
        // placeholder view for ReportesController
        $this->render('dashboard/placeholder.php', ['title' => 'ReportesController']);
    }
}
