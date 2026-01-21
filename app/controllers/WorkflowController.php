<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class WorkflowController extends Controller
{
    public function index(): void
    {
        // placeholder view for WorkflowController
        $this->render('dashboard/placeholder.php', ['title' => 'WorkflowController']);
    }
}
