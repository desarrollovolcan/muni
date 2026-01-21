<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;
use App\Models\Solicitud;
use App\Models\Entrega;
use App\Models\Beneficio;
use App\Models\Notificacion;

class DashboardController extends Controller
{
    public function index(): void
    {
        AuthMiddleware::handle();
        $solicitudModel = new Solicitud();
        $entregaModel = new Entrega();
        $beneficioModel = new Beneficio();
        $notifModel = new Notificacion();
        $municipio = $_SESSION['municipio_id'] ?? 0;

        $solicitudes = $solicitudModel->all(['id_municipio' => $municipio]);
        $entregas = $entregaModel->all(['id_municipio' => $municipio]);
        $beneficios = $beneficioModel->all(['id_municipio' => $municipio]);
        $notificaciones = $notifModel->all(['id_municipio' => $municipio]);

        $this->render('dashboard/index.php', compact('solicitudes','entregas','beneficios','notificaciones'));
    }
}
