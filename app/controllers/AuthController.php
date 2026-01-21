<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Config;
use App\Core\Validator;
use App\Models\Rol;
use App\Models\Usuario;

class AuthController extends Controller
{
    protected string $layout = 'layouts/main.php';

    public function loginForm(): void
    {
        $this->layout = 'layouts/auth.php';
        $this->render('auth/login.php');
    }

    public function registerForm(): void
    {
        $this->layout = 'layouts/auth.php';
        $rolModel = new Rol();
        $roles = $rolModel->all();
        $this->render('auth/register.php', [
            'roles' => $roles,
        ]);
    }

    public function register(): void
    {
        if (!Csrf::validate($_POST['_token'] ?? '')) {
            $_SESSION['error'] = 'Token inválido';
            $this->redirect('/register');
        }

        $data = [
            'nombre' => Validator::sanitizeString($_POST['nombre'] ?? ''),
            'apellido' => Validator::sanitizeString($_POST['apellido'] ?? ''),
            'rut' => rut_normalizar(Validator::sanitizeString($_POST['rut'] ?? '')),
            'cargo' => Validator::sanitizeString($_POST['cargo'] ?? ''),
            'fecha_nacimiento' => Validator::sanitizeString($_POST['fecha_nacimiento'] ?? ''),
            'rol_id' => (int)($_POST['rol_id'] ?? 0),
            'email' => Validator::sanitizeString($_POST['email'] ?? ''),
            'password' => $_POST['password'] ?? '',
            'password_confirm' => $_POST['password_confirm'] ?? '',
        ];

        $errors = Validator::required($data, [
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'rut' => 'RUT',
            'cargo' => 'Cargo',
            'fecha_nacimiento' => 'Fecha de nacimiento',
            'rol_id' => 'Rol',
            'email' => 'Email',
            'password' => 'Contraseña',
            'password_confirm' => 'Confirmación de contraseña',
        ]);

        if (!empty($data['email']) && !Validator::email($data['email'])) {
            $errors['email'] = 'El email no es válido';
        }

        if (!empty($data['rut']) && !rut_validar($data['rut'])) {
            $errors['rut'] = 'El RUT no es válido';
        }

        if ($data['password'] !== $data['password_confirm']) {
            $errors['password_confirm'] = 'Las contraseñas no coinciden';
        }

        if (!empty($data['password']) && strlen($data['password']) < 8) {
            $errors['password'] = 'La contraseña debe tener al menos 8 caracteres';
        }

        $rolModel = new Rol();
        $rol = $data['rol_id'] > 0 ? $rolModel->findById($data['rol_id']) : null;
        if (!$rol) {
            $errors['rol_id'] = 'Selecciona un rol válido';
        }

        $usuarioModel = new Usuario();
        if (!empty($data['email']) && $usuarioModel->findByEmailAll($data['email'])) {
            $errors['email'] = 'El email ya está registrado';
        }
        if (!empty($data['rut']) && $usuarioModel->findByRut($data['rut'])) {
            $errors['rut'] = 'El RUT ya está registrado';
        }

        if (!empty($errors)) {
            $_SESSION['error'] = implode(' | ', $errors);
            $this->redirect('/register');
        }

        $userId = $usuarioModel->createUser([
            'id_municipio' => Config::get('default_municipio_id', 1),
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'rut' => $data['rut'],
            'cargo' => $data['cargo'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'email' => $data['email'],
            'password_hash' => password_hash($data['password'], PASSWORD_DEFAULT),
        ]);
        $usuarioModel->assignRole($userId, $data['rol_id']);

        $_SESSION['success'] = 'Usuario registrado correctamente. Ya puedes iniciar sesión.';
        $this->redirect('/login');
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
