<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\BeneficiaryAuthMiddleware;
use App\Models\Solicitud;
use App\Models\Entrega;

class PortalDashboardController extends Controller
{
    protected string $layout = 'layouts/portal.php';

    public function index(): void
    {
        BeneficiaryAuthMiddleware::handle();
        $solModel = new Solicitud();
        $entregasModel = new Entrega();
        $beneficiaryId = $_SESSION['beneficiary_id'] ?? 0;
        $solicitudes = $solModel->all(['id_beneficiario' => $beneficiaryId]);
        $entregas = $entregasModel->all(['id_beneficiario' => $beneficiaryId]);
        $this->render('portal/index.php', compact('solicitudes','entregas'));
    }
}
