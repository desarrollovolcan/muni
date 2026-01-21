<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Usuario extends Model
{
    protected string $table = 'usuarios';

    public function findByEmail(string $email)
    {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE email = :email AND estado = 1');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function roles(int $userId): array
    {
        $stmt = $this->db->prepare('SELECT r.nombre FROM roles r INNER JOIN usuario_roles ur ON ur.id_rol = r.id WHERE ur.id_usuario = :id AND r.estado=1');
        $stmt->execute(['id' => $userId]);
        return array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'nombre');
    }

    public function updateLastAccess(int $id): void
    {
        $stmt = $this->db->prepare('UPDATE usuarios SET ultimo_acceso = NOW() WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
