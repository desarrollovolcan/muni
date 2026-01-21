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
        $stmt = $this->db->prepare('SELECT r.nombre FROM roles r INNER JOIN usuario_rol ur ON ur.id_rol = r.id_rol WHERE ur.id_usuario = :id AND r.estado=1');
        $stmt->execute(['id' => $userId]);
        return array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'nombre');
    }

    public function updateLastAccess(int $id): void
    {
        $stmt = $this->db->prepare('UPDATE usuarios SET ultimo_acceso = NOW() WHERE id_usuario = :id');
        $stmt->execute(['id' => $id]);
    }

    public function findByRut(string $rut)
    {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE rut = :rut');
        $stmt->execute(['rut' => $rut]);
        return $stmt->fetch();
    }

    public function findByEmailAll(string $email)
    {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function createUser(array $data): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO usuarios (id_municipio, nombre, apellido, rut, cargo, fecha_nacimiento, email, password_hash, estado)
            VALUES (:id_municipio, :nombre, :apellido, :rut, :cargo, :fecha_nacimiento, :email, :password_hash, :estado)'
        );
        $stmt->execute([
            'id_municipio' => $data['id_municipio'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'rut' => $data['rut'],
            'cargo' => $data['cargo'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'email' => $data['email'],
            'password_hash' => $data['password_hash'],
            'estado' => $data['estado'] ?? 1,
        ]);
        return (int) $this->db->lastInsertId();
    }

    public function assignRole(int $userId, int $roleId): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO usuario_rol (id_usuario, id_rol, estado) VALUES (:id_usuario, :id_rol, 1)'
        );
        $stmt->execute([
            'id_usuario' => $userId,
            'id_rol' => $roleId,
        ]);
    }
}
