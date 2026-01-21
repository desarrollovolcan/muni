<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Validator;

class AuthController extends Controller
{
    protected string $layout = 'layouts/main.php';

    public function loginForm(): void
    {
        $this->layout = 'layouts/auth.php';
        $this->render('auth/login.php');
    }

    public function login(): void
    {
        if (!Csrf::validate($_POST['_token'] ?? '')) {
            $_SESSION['error'] = 'Token inválido';
            $this->redirect('/login');
        }
        $email = Validator::sanitizeString($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        if (Auth::loginUser($email, $password, $ip)) {
            $_SESSION['success'] = 'Bienvenido';
            $this->redirect('/dashboard');
        }
        $_SESSION['error'] = 'Credenciales inválidas';
        $this->redirect('/login');
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect('/login');
    }
}
