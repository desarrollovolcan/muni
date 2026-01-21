<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Core\Config;
use App\Core\Database;
use App\Core\Mailer;

Config::load(dirname(__DIR__));
$db = Database::getInstance();

$stmt = $db->prepare("SELECT n.*, e.host, e.port, e.secure, e.user, e.password, e.from_email, e.from_name, b.nombre AS beneficio FROM notificaciones n INNER JOIN email_configs e ON e.id = n.id_email_config LEFT JOIN beneficios b ON b.id = n.id_beneficio WHERE n.envio_estado = 'PENDIENTE' AND n.estado = 1 AND (n.programada_para IS NULL OR n.programada_para <= NOW()) LIMIT 20");
$stmt->execute();
$notificaciones = $stmt->fetchAll();

foreach ($notificaciones as $notif) {
    $config = [
        'host' => $notif['host'],
        'port' => $notif['port'],
        'secure' => $notif['secure'],
        'user' => $notif['user'],
        'password' => $notif['password'],
        'from_email' => $notif['from_email'],
        'from_name' => $notif['from_name']
    ];
    $ok = Mailer::send($config, $notif['para_email'], $notif['para_nombre'], $notif['asunto'], $notif['cuerpo']);
    $estado = $ok ? 'ENVIADA' : 'ERROR';
    $db->prepare('UPDATE notificaciones SET envio_estado = :estado, intentos = intentos + 1, fecha_envio = NOW() WHERE id = :id')->execute(['estado' => $estado, 'id' => $notif['id']]);
    echo "Notificación {$notif['id']} => {$estado}\n";
}
