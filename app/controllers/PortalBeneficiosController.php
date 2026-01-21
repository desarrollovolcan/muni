<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\BeneficiaryAuthMiddleware;
use App\Models\Beneficio;
use App\Models\PeriodoPostulacion;

class PortalBeneficiosController extends Controller
{
    protected string $layout = 'layouts/portal.php';

    public function index(): void
    {
        BeneficiaryAuthMiddleware::handle();
        $beneficioModel = new Beneficio();
        $beneficios = $beneficioModel->all(['id_municipio' => $_SESSION['municipio_id'] ?? 0]);
        $this->render('portal/beneficios/index.php', compact('beneficios'));
    }

    public function show(int $id): void
    {
        BeneficiaryAuthMiddleware::handle();
        $beneficioModel = new Beneficio();
        $beneficio = $beneficioModel->find($id);
        $this->render('portal/beneficios/show.php', compact('beneficio'));
    }
}
