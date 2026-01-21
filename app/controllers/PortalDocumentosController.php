<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\BeneficiaryAuthMiddleware;

class PortalDocumentosController extends Controller
{
    public function index(): void
    {
        // placeholder view for PortalDocumentosController
        $this->render('dashboard/placeholder.php', ['title' => 'PortalDocumentosController']);
    }
}
