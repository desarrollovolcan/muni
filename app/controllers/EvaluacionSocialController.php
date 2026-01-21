<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class EvaluacionSocialController extends Controller
{
    public function index(): void
    {
        // placeholder view for EvaluacionSocialController
        $this->render('dashboard/placeholder.php', ['title' => 'EvaluacionSocialController']);
    }
}
