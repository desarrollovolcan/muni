<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Validator;
use function rut_normalizar;

class PortalAuthController extends Controller
{
    protected string $layout = 'layouts/portal.php';

    public function loginForm(): void
    {
        $this->layout = 'layouts/portal_auth.php';
        $this->render('portal/auth/login.php');
    }

    public function login(): void
    {
        if (!Csrf::validate($_POST['_token'] ?? '')) {
            $_SESSION['error'] = 'Token inválido';
            $this->redirect('/portal/login');
        }
        $rut = rut_normalizar($_POST['rut'] ?? '');
        $password = $_POST['password'] ?? '';
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        if (Auth::loginBeneficiary($rut, $password, $ip)) {
            $_SESSION['success'] = 'Bienvenido';
            $this->redirect('/portal');
        }
        $_SESSION['error'] = 'Credenciales inválidas';
        $this->redirect('/portal/login');
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect('/portal/login');
    }
}
