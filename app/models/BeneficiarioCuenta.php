<?php
namespace App\Models;

use App\Core\Model;

class BeneficiarioCuenta extends Model
{
    protected string $table = 'beneficiario_cuentas';

    public function findByRut(string $rut)
    {
        $stmt = $this->db->prepare('SELECT * FROM beneficiario_cuentas WHERE rut = :rut AND estado = 1');
        $stmt->execute(['rut' => $rut]);
        return $stmt->fetch();
    }
}
