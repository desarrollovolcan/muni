<?php
namespace App\Models;

use App\Core\Model;

class Rol extends Model
{
    protected string $table = 'roles';

    public function findById(int $id)
    {
        $stmt = $this->db->prepare('SELECT * FROM roles WHERE id_rol = :id AND estado = 1');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}
