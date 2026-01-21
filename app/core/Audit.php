<?php
namespace App\Core;

use App\Core\Database;
use PDO;

class Audit
{
    public static function log(string $entidad, ?int $idEntidad, string $accion, string $ip, string $detalle = ''): void
    {
        $db = Database::getInstance();
        $stmt = $db->prepare('INSERT INTO auditoria (entidad, id_entidad, accion, ip, detalle, fecha, estado) VALUES (:entidad,:id_entidad,:accion,:ip,:detalle,NOW(),1)');
        $stmt->execute([
            'entidad' => $entidad,
            'id_entidad' => $idEntidad,
            'accion' => $accion,
            'ip' => $ip,
            'detalle' => $detalle
        ]);
    }
}
