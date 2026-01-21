<?php
namespace App\Core;

use App\Models\Usuario;
use App\Models\BeneficiarioCuenta;
use App\Core\Audit;

class Auth
{
    public static function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'secure' => Config::get('session_secure', false),
                'httponly' => true,
                'samesite' => 'Lax'
            ]);
            session_start();
        }
    }

    public static function loginUser(string $email, string $password, string $ip): bool
    {
        self::startSession();
        $userModel = new Usuario();
        $user = $userModel->findByEmail($email);
        if ($user && (int)$user['estado'] === 1 && password_verify($password, $user['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['municipio_id'] = $user['id_municipio'];
            $_SESSION['roles'] = $userModel->roles($user['id']);
            $userModel->updateLastAccess($user['id']);
            Audit::log('usuario', $user['id'], 'LOGIN_OK', $ip, 'Usuario municipal');
            return true;
        }
        Audit::log('usuario', $user['id'] ?? null, 'LOGIN_FAIL', $ip, 'Usuario municipal');
        return false;
    }

    public static function loginBeneficiary(string $rut, string $password, string $ip): bool
    {
        self::startSession();
        $accountModel = new BeneficiarioCuenta();
        $account = $accountModel->findByRut($rut);
        if ($account && (int)$account['estado'] === 1 && password_verify($password, $account['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['beneficiary_id'] = $account['id_beneficiario'];
            $_SESSION['municipio_id'] = $account['id_municipio'];
            Audit::log('beneficiario', $account['id_beneficiario'], 'LOGIN_OK', $ip, 'Portal beneficiario');
            return true;
        }
        Audit::log('beneficiario', $account['id_beneficiario'] ?? null, 'LOGIN_FAIL', $ip, 'Portal beneficiario');
        return false;
    }

    public static function check(): bool
    {
        self::startSession();
        return isset($_SESSION['user_id']);
    }

    public static function checkBeneficiary(): bool
    {
        self::startSession();
        return isset($_SESSION['beneficiary_id']);
    }

    public static function logout(): void
    {
        self::startSession();
        session_destroy();
    }
}
