<?php

declare(strict_types=1);

class User
{
    public static function findByRut(PDO $pdo, string $rut): ?array
    {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE rut = :rut LIMIT 1');
        $stmt->execute(['rut' => $rut]);
        $user = $stmt->fetch();

        return $user ?: null;
    }

    public static function create(PDO $pdo, array $data): int
    {
        $stmt = $pdo->prepare(
            'INSERT INTO users (nombre, apellido, rut, cargo, fecha_nacimiento, rol, password_hash)
             VALUES (:nombre, :apellido, :rut, :cargo, :fecha_nacimiento, :rol, :password_hash)'
        );

        $stmt->execute([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'rut' => $data['rut'],
            'cargo' => $data['cargo'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'rol' => $data['rol'],
            'password_hash' => $data['password_hash'],
        ]);

        return (int) $pdo->lastInsertId();
    }
}
